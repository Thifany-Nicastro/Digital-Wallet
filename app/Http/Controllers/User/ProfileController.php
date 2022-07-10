<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\JsonResponse;

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
