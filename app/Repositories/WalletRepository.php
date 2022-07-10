<?php

namespace App\Repositories;

use App\Interfaces\WalletRepositoryInterface;
use App\Models\Wallet;

class WalletRepository implements WalletRepositoryInterface
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
            'balance' => $currentBalance + $amount
        ]);
    }

    public function removeFromWallet(string $walletId, float $amount): void
    {
        $wallet = Wallet::findOrFail($walletId);

        $currentBalance = $wallet->balance;

        $wallet->update([
            'balance' => $currentBalance - $amount
        ]);
    }
}
