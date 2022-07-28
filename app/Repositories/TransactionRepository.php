<?php

namespace App\Repositories;

use App\Interfaces\ITransactionRepository;
use App\Models\Transaction;

class TransactionRepository implements ITransactionRepository
{
    public function createTransaction(array $transactionDetails): Transaction
    {
        return Transaction::create($transactionDetails);
    }
}
