<?php

namespace App\Exceptions\Transaction;

use Exception;
use Illuminate\Http\Response;

class PaymentUnauthorizedException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Payment not authorized',
        ], Response::HTTP_BAD_REQUEST);
    }
}
