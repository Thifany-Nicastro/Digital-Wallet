<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Services\Transaction\CreateTransactionService;
use App\Http\Requests\TransactionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Resources\TransactionResource;

class CreateTransactionController extends Controller
{
    public function __construct(
        private CreateTransactionService $transactionService
    ) {}

    public function __invoke(TransactionRequest $request): JsonResponse
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
