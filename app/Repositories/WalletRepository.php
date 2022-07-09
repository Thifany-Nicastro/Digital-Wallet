<?php

namespace App\Repositories;

use App\Interfaces\WalletRepositoryInterface;
use App\Models\Wallet;

class WalletRepository implements WalletRepositoryInterface
{
    public function getWalletByUserId(string $userId): Wallet
    {
        return Wallet::where('user_id', $userId)->firstOrFail();
    }

    public function getWalletById(string $walletId): Wallet
    {
        return Wallet::findOrFail($walletId);
    }

    public function addToWallet(string $walletId, float $amount)
    {
        $wallet = Wallet::findOrFail($walletId);

        $currentBalance = $wallet->balance;

        $wallet->update([
            'balance' => $currentBalance + $amount
        ]);
    }

    public function removeFromWallet(string $walletId, float $amount)
    {
        $wallet = Wallet::findOrFail($walletId);

        $currentBalance = $wallet->balance;

        $wallet->update([
            'balance' => $currentBalance - $amount
        ]);
    }
}
