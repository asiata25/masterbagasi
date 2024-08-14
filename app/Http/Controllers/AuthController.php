<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    function register(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'username' => ['required', 'max:200', 'unique:users'],
            'name' => ['required', 'max:200'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create($validated);
        $token = $user->createToken($validated['username']);

        return response()->json([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
            ],
            'token' => $token->plainTextToken
        ]);
    }

    function login(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $user = User::where('username', $validated['username'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'the provided credential is incorrect'
            ])->setStatusCode(404);
        }

        $token = $user->createToken($validated['username']);

        return response()->json([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
            ],
            'token' => $token->plainTextToken
        ]);
    }

    function logout(Request $request) : JsonResponse {
        $request->user()->tokens()->delete();
        
        return response()->json([
            'message' => 'success'
        ]);
    }
}
