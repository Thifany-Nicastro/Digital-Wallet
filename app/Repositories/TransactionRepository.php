<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Transaction;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function createTransaction(array $transactionDetails): Transaction
    {
        return Transaction::create($transactionDetails);
    }
}
