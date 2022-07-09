<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Response;
use App\Services\AuthService;
use Exception;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService
    ) {}

    public function login(AuthRequest $request): JsonResponse
    {
        try {
            $token = $this->authService->login($request->validated());

            return response()->json([
                'token' => $token,
            ], Response::HTTP_OK);

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
