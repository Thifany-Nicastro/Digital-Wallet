<?php

namespace App\Interfaces;

use App\Models\Transaction;

interface ITransactionRepository
{
    public function createTransaction(array $transactionDetails): Transaction;
}
