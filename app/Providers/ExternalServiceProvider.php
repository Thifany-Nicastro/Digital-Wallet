<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PaymentAuthorizationServiceInterface;
use App\Interfaces\PaymentNotificationServiceInterface;
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
        $this->app->bind(PaymentAuthorizationServiceInterface::class, PaymentAuthorizationService::class);
        $this->app->bind(PaymentNotificationServiceInterface::class, PaymentNotificationService::class);
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
