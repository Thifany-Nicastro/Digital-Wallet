<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\IPaymentAuthorizationService;
use App\Interfaces\IPaymentNotificationService;
use App\Services\External\PaymentAuthorizationService;
use App\Services\External\PaymentNotificationService;

class ExternalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPaymentAuthorizationService::class, PaymentAuthorizationService::class);
        $this->app->bind(IPaymentNotificationService::class, PaymentNotificationService::class);
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
