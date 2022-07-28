<?php

namespace App\Repositories;

use App\Interfaces\IWalletRepository;
use App\Models\Wallet;
use Illuminate\Support\Collection;

class WalletRepository implements IWalletRepository
{
    public function getWalletBalance(string $walletId): float
    {
        return Wallet::findOrFail($walletId)->balance;
    }

    public function addToWallet(string $walletId, float $amount): void
    {
        $wallet = Wallet::findOrFail($walletId);

        $currentBalance = $wallet->balance;

        $wallet->update([
            'balance' => $currentBalance + $amount,
        ]);
    }

    public function removeFromWallet(string $walletId, float $amount): void
    {
        $wallet = Wallet::findOrFail($walletId);

        $currentBalance = $wallet->balance;

        $wallet->update([
            'balance' => $currentBalance - $amount,
        ]);
    }

    public function getWalletTransactions(string $walletId): Collection
    {
        $wallet = Wallet::findOrFail($walletId);

        return $wallet->allTransactions();
    }
}
