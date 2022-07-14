<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface WalletRepositoryInterface
{
    public function getWalletBalance(string $walletId): float;
    public function addToWallet(string $walletId, float $amount): void;
    public function removeFromWallet(string $walletId, float $amount): void;
    public function getWalletTransactions(string $walletId): Collection;
}
