<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\TransactionRepositoryInterface;
use App\Repositories\TransactionRepository;
use App\Interfaces\WalletRepositoryInterface;
use App\Repositories\WalletRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(WalletRepositoryInterface::class, WalletRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
