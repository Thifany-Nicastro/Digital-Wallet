<?php

namespace App\Services\Transaction;

use App\Interfaces\IWalletRepository;
use Illuminate\Support\Collection;

class ListTransactionService
{
    public function __construct(
        private IWalletRepository $walletRepository,
    ) {
    }

    public function getUserTransactions(string $walletId): Collection
    {
        $transactions = $this->walletRepository->getWalletTransactions($walletId);

        return $transactions->sortByDesc('created_at');
    }
}
