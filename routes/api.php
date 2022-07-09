<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;
use App\Http\Controllers\Users\AuthController;
use App\Http\Controllers\Users\ProfileController;

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

Route::post('/login', [AuthController::class, 'login']);

Route::get('/profiles', ProfileController::class)->middleware('auth:api');

Route::fallback(function () {
    abort(Response::HTTP_NOT_FOUND, 'Page Not Found');
});
