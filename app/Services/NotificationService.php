<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NotificationService
{
    private const SUCCESS = 'Success';

    public static function verifyNotificationService(): bool
    {
        $response = Http::get('http://o4d9z.mocklab.io/notify')->json();

        return $response['message'] === self::SUCCESS;
    }
}
