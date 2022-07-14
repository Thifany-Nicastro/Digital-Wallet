<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\User\AuthenticationController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Transaction\CreateTransactionController;
use App\Http\Controllers\Transaction\ListTransactionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/ping', function () {
    return response()->json([
        'message' => 'Pong!',
    ]);
});

Route::post('/login', [AuthenticationController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showUserProfile']);

    Route::post('/transactions', CreateTransactionController::class)->middleware('customer');
    Route::get('/transactions', ListTransactionsController::class);
});


Route::fallback(function () {
    abort(Response::HTTP_NOT_FOUND, 'Page Not Found');
});
