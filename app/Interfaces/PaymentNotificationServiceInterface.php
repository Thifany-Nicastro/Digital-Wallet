<?php

namespace App\Interfaces;

interface PaymentNotificationServiceInterface
{
    public function isAvailable(): bool;
}
