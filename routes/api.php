<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogoBocaController;
use App\Http\Controllers\CatalogoCaraController;
use App\Http\Controllers\CatalogoCejasController;
use App\Http\Controllers\CatalogoComplexionController;
use App\Http\Controllers\CatalogoFrenteController;
use App\Http\Controllers\CatalogoMentonController;
use App\Http\Controllers\CatalogoNarizController;
use App\Http\Controllers\CatalogoOjosController;
use App\Http\Controllers\CatalogoSexoController;
use App\Http\Controllers\CatalogoTezController;
use App\Models\CatalogoComplexion;
use Illuminate\Support\Facades\Route;

Route::apiResource('sexo', CatalogoSexoController::class);
Route::apiResource('complexion', CatalogoComplexionController::class);
Route::apiResource('tez', CatalogoTezController::class);
Route::apiResource('frente', CatalogoFrenteController::class);
Route::apiResource('ceja', CatalogoCejasController::class);
Route::apiResource('ojo', CatalogoOjosController::class);
Route::apiResource('nariz', CatalogoNarizController::class);
Route::apiResource('boca', CatalogoBocaController::class);
Route::apiResource('menton', CatalogoMentonController::class);
Route::apiResource('cara', CatalogoCaraController::class);
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

