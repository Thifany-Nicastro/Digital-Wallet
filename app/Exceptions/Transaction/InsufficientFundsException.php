<?php

namespace App\Exceptions\Transaction;

use Exception;
use Illuminate\Http\Response;

class InsufficientFundsException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'Insufficient funds',
        ], Response::HTTP_BAD_REQUEST);
    }
}
