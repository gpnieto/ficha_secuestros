<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller {
    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');
        $remember = $request->input('remember', false);
        $user = User::where('email', $credentials['email'])->first();

        $expires_at = $remember ? now()->addMinutes(60 * 24) : now()->addMinutes(30);

        if(!$user)
            return response()->json([
                'errors' => [
                    'email' => ['El usuario no existe']
                ],
            ], 400);

        if(Hash::check($credentials['password'], $user->password)){
            $user->tokens()->delete();
            return response()->json([
                'data' => [
                    'user' => $user,
                    'token' => $user->createToken('auth_token', ['*'], $expires_at)->plainTextToken
                ]
            ]);
        } else {
            return response()->json([
                'errors' => [
                    'password' => ['La contraseña es incorrecta']
                ],
            ], 400);
        }
    }

    public function logout(Request $request) {
        auth('sanctum')->user()->tokens()->delete();
        return response()->json();
    }
}
