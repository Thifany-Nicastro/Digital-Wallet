<?php

namespace App\Http\Controllers\Wallet;

use App\Http\Controllers\Controller;
use App\Services\TransactionService;
use App\Http\Requests\TransactionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    public function __construct(
        private TransactionService $transactionService
    ) {}

    public function createNewTransaction(TransactionRequest $request): JsonResponse
    {
        $transaction = $this->transactionService->createNewTransaction(
            auth()->user()->wallet->id,
            $request->validated()
        );

        return response()->json(
            new TransactionResource($transaction),
            Response::HTTP_OK
        );
    }
}
