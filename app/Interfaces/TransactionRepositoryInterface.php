<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function createTransaction(array $transactionDetails);
}
