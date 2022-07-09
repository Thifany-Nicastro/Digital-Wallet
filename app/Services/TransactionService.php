<?php

namespace App\Services;

use App\Models\Transaction;
use App\Interfaces\TransactionRepositoryInterface;
use App\Interfaces\WalletRepositoryInterface;
use App\Services\PaymentAuthorizationService;
use App\Exceptions\Transaction\InsufficientFundsException;
use App\Exceptions\Transaction\PaymentUnauthorizedException;

class TransactionService
{
    public function __construct(
        private TransactionRepositoryInterface $transactionRepository,
        private WalletRepositoryInterface $walletRepository,
        private PaymentAuthorizationService $paymentAuthorizationService
    ) {}

    public function createNewTransaction(string $sender, array $transactionDetails): Transaction
    {
        $authorized = $this->paymentAuthorizationService->checkAuthorization();

        if (!$authorized) {
            throw new PaymentUnauthorizedException();
        }

        $walletBalance = $this->walletRepository->getWalletById($sender)->balance;

        if ($walletBalance < $transactionDetails['amount']) {
            throw new InsufficientFundsException();
        }

        return $this->transactionRepository->createTransaction([
            'sender_id' => $sender,
            ... $transactionDetails,
        ]);
    }
}
