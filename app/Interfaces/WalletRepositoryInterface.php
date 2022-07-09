<?php

namespace App\Interfaces;

use App\Models\Wallet;

interface WalletRepositoryInterface
{
    public function getWalletByUserId(string $userId): Wallet;
    public function getWalletById(string $walletId): Wallet;
    public function addToWallet(string $walletId, float $amount);
    public function removeFromWallet(string $walletId, float $amount);
}
