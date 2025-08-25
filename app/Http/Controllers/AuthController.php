<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class AuthController extends Controller {

    /**
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request) : JsonResponse {
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
                    'user' => $user->only('name', 'email'),
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


    /**
     * @return JsonResponse
     */
    public function logout() : JsonResponse {
        try {
            auth('sanctum')->user()->tokens()->delete();

            return response()->json([
                'result' => true,
                'message' => 'Sesión cerrada correctamente'
            ]);
        }catch (\Exception $e){
            Log::warning($e->getMessage());

            return response()->json([
                'result' => false,
                'message' => 'El usuario no esta autenticado'
            ]);
        }
    }
}
