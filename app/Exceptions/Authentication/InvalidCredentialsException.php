<?php

namespace App\Exceptions\Authentication;

use Exception;
use Illuminate\Http\Response;

class InvalidCredentialsException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Invalid credentials'
        ], Response::HTTP_UNAUTHORIZED);
    }
}
