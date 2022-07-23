<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function showUserProfile(): JsonResponse
    {
        return response()->json(
            new ProfileResource(auth()->user()),
            Response::HTTP_OK
        );
    }
}
