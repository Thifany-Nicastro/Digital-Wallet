<?php

namespace App\Interfaces;

use App\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function createTransaction(array $transactionDetails): Transaction;
}
