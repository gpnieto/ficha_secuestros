<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogoSexoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('sexo', CatalogoSexoController::class);

// auth:sanctum
// auth('sanctum')->user()

Route::prefix('auth')->group(function (){
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('/logout', [AuthController::class, 'logout']);
    });
    Route::middleware('guest')->group(function (){
        Route::post('/login', [AuthController::class, 'login']);
    });
});

