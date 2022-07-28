<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ITransactionRepository;
use App\Interfaces\IWalletRepository;
use App\Repositories\TransactionRepository;
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
        $this->app->bind(ITransactionRepository::class, TransactionRepository::class);
        $this->app->bind(IWalletRepository::class, WalletRepository::class);
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
