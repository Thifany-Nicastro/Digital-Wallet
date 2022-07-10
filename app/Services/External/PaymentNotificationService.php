<?php

namespace App\Services\External;

use Illuminate\Support\Facades\Http;

class PaymentNotificationService
{
    private const SUCCESS = 'Success';

    public static function isAvailable(): bool
    {
        $response = Http::get('http://o4d9z.mocklab.io/notify')->json();

        return $response['message'] === self::SUCCESS;
    }
}
