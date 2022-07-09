<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymentAuthorizationService
{
    const AUTHORIZED = 'Autorizado';

    public function checkAuthorization(): bool
    {
        $response = Http::get('https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6')->json();

        return $response['message'] === self::AUTHORIZED;
    }
}
