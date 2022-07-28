<?php

namespace App\Services\Transaction;

use Illuminate\Support\Facades\DB;
use App\Exceptions\Transaction\InsufficientFundsException;
use App\Exceptions\Transaction\PaymentUnauthorizedException;
use App\Exceptions\Transaction\UnsuccessfulTransactionException;
use App\Interfaces\ITransactionRepository;
use App\Interfaces\IWalletRepository;
use App\Interfaces\IPaymentAuthorizationService;
use App\Models\Transaction;
use Exception;

class CreateTransactionService
{
    public function __construct(
        private ITransactionRepository $transactionRepository,
        private IWalletRepository $walletRepository,
        private IPaymentAuthorizationService $paymentAuthorizationService,
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
