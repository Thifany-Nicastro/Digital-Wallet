<?php

namespace App\Services\External;

use Illuminate\Support\Facades\Http;
use App\Interfaces\IPaymentNotificationService;

class PaymentNotificationService implements IPaymentNotificationService
{
    private const SUCCESS = 'Success';

    public function isAvailable(): bool
    {
        $response = Http::get('http://o4d9z.mocklab.io/notify')->json();

        return $response['message'] === self::SUCCESS;
    }
}
