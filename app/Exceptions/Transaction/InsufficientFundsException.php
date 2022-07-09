<?php

namespace App\Exceptions\Transaction;

use Exception;

class InsufficientFundsException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Insufficient funds'
        ], 400);
    }
}
