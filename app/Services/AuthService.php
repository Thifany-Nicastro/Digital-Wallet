<?php

namespace App\Services;

use Exception;

class AuthService
{
    public function login(array $credentials): string
    {
        $token = auth()->attempt($credentials);

        if (!$token) {
            throw new Exception('Invalid credentials');
        }

        return $token;
    }
}
