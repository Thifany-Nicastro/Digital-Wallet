<?php

namespace App\Services\External;

use Illuminate\Support\Facades\Http;
use App\Interfaces\IPaymentAuthorizationService;

class PaymentAuthorizationService implements IPaymentAuthorizationService
{
    private const AUTHORIZED = 'Autorizado';

    public function isAuthorized(): bool
    {
        $response = Http::get('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6')->json();

        return $response['message'] === self::AUTHORIZED;
    }
}
