<?php

namespace App\Services;

use App\Models\Transaction;
use App\Interfaces\TransactionRepositoryInterface;

class TransactionService
{
    public function __construct(
        private TransactionRepositoryInterface $transactionRepository
    ) {}

    public function pay(string $payer, array $transactionDetails): Transaction
    {
        return $this->transactionRepository->createTransaction([
            'sender_id' => $payer,
            ... $transactionDetails,
        ]);
    }
}
