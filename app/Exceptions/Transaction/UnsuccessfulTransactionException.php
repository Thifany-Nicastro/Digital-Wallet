<?php

namespace App\Exceptions\Transaction;

use Exception;
use Illuminate\Http\Response;

class UnsuccessfulTransactionException extends Exception
{
    public function render($request)
    {
        return response()->json([
            'message' => 'An error occurred while processing your transaction',
        ], Response::HTTP_BAD_REQUEST);
    }
}
