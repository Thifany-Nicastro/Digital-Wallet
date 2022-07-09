<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PaymentReceived;

class NotificationService
{
    const SUCCESS = 'Success';

    public static function verifyNotificationService(): bool
    {
        $response = Http::get('http://o4d9z.mocklab.io/notify')->json();

        return $response['message'] === self::SUCCESS;
    }
}
