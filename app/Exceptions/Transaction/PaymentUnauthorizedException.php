<?php

namespace App\Exceptions\Transaction;

use Exception;

class PaymentUnauthorizedException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Payment not authorized'
        ], 400);
    }
}
