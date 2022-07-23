<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Services\Transaction\CreateTransactionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateTransactionController extends Controller
{
    public function __construct(
        private CreateTransactionService $transactionService
    ) {
    }

    public function __invoke(TransactionRequest $request): JsonResponse
    {
        $transaction = $this->transactionService->createNewTransaction(
            auth()->user()->wallet->id,
            $request->validated()
        );

        return response()->json(
            new TransactionResource($transaction),
            Response::HTTP_CREATED
        );
    }
}
