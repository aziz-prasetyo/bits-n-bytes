<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $data = [
                'grant_type' => 'password',
                'client_id' => env('PASSPORT_PASSWORD_CLIENT_ID'),
                'client_secret' => env('PASSPORT_PASSWORD_SECRET'),
                'username' => $request->email,
                'password' => $request->password,
                'scope' => '',
            ];

            $tokenRequest = Request::create(
                '/oauth/token',
                'POST',
                $data
            );

            $response = app()->handle($tokenRequest);

            $user['token'] = json_decode($response->getContent(), true);

            return response()->json([
                'success' => true,
                'statusCode' => 200,
                'message' => 'User has been logged successfully.',
                'data' => $user,
            ], 200);
        } else {
            return response()->json([
                'success' => true,
                'statusCode' => 401,
                'message' => 'Failed to login, please try again later.',
                'errors' => 'Unauthorized',
            ], 401);
        }
    }

    public function me(): JsonResponse
    {

        $user = auth()->user();

        return response()->json([
            'success' => true,
            'statusCode' => 200,
            'message' => 'Authenticated user info.',
            'data' => $user,
        ], 200);
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return response()->json([
            'success' => true,
            'statusCode' => 200,
            'message' => 'Logged out successfully.',
        ], 200);
    }
}
