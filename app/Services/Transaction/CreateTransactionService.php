<?php

namespace App\Services\Transaction;

use App\Exceptions\Transaction\InsufficientFundsException;
use App\Exceptions\Transaction\PaymentUnauthorizedException;
use App\Exceptions\Transaction\UnsuccessfulTransactionException;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\WalletRepositoryInterface;
use App\Models\Transaction;
use App\Services\External\PaymentAuthorizationService;
use Exception;
use Illuminate\Support\Facades\DB;

class CreateTransactionService
{
    public function __construct(
        private TransactionRepositoryInterface $transactionRepository,
        private WalletRepositoryInterface $walletRepository,
        private PaymentAuthorizationService $paymentAuthorizationService,
    ) {
    }

    public function createNewTransaction(string $sender, array $transactionDetails): Transaction
    {
        $authorized = $this->paymentAuthorizationService->isAuthorized();

        if (! $authorized) {
            throw new PaymentUnauthorizedException();
        }

        $walletBalance = $this->walletRepository->getWalletBalance($sender);

        if ($walletBalance < $transactionDetails['amount']) {
            throw new InsufficientFundsException();
        }

        DB::beginTransaction();

        try {
            $transaction = $this->transactionRepository->createTransaction([
                'sender_id' => $sender,
                ...$transactionDetails,
            ]);

            $this->walletRepository->removeFromWallet($transaction->sender_id, $transaction->amount);
            $this->walletRepository->addToWallet($transaction->receiver_id, $transaction->amount);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            throw new UnsuccessfulTransactionException();
        }

        return $transaction;
    }
}