<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Services\Transaction\ListTransactionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use App\Http\Resources\TransactionResource;

class ListTransactionsController extends Controller
{
    public function __construct(
        private ListTransactionService $transactionService
    ) {}

    public function __invoke(): JsonResponse
    {
        $transactions = $this->transactionService->getUserTransactions(
            auth()->user()->wallet->id
        );

        return response()->json(
            TransactionResource::collection($transactions),
            Response::HTTP_OK
        );
    }
}
