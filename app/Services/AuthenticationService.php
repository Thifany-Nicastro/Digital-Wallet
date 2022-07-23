<?php

namespace App\Services;

use App\Exceptions\Authentication\InvalidCredentialsException;

class AuthenticationService
{
    public function login(array $credentials): string
    {
        $token = auth()->attempt($credentials);

        if (! $token) {
            throw new InvalidCredentialsException();
        }

        return $token;
    }
}
