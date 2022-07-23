<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;
use App\Services\AuthenticationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthenticationController extends Controller
{
    public function __construct(
        private AuthenticationService $authService
    ) {
    }

    public function login(AuthenticationRequest $request): JsonResponse
    {
        $token = $this->authService->login($request->validated());

        return response()->json([
            'access_token' => $token,
        ], Response::HTTP_OK);
    }
}
