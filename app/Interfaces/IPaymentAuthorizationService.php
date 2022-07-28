<?php

namespace App\Interfaces;

interface IPaymentAuthorizationService
{
    public function isAuthorized(): bool;
}
