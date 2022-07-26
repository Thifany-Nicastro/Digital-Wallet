<?php

namespace App\Interfaces;

interface PaymentAuthorizationServiceInterface
{
    public function isAuthorized(): bool;
}
