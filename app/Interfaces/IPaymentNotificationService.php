<?php

namespace App\Interfaces;

interface IPaymentNotificationService
{
    public function isAvailable(): bool;
}
