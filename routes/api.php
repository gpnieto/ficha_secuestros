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
use App\Http\Controllers\FichaRegistroController;
use App\Models\CatalogoComplexion;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function (){
   Route::apiResources([
       'sexo' => CatalogoSexoController::class,
       'complexion' => CatalogoComplexionController::class,
       'tez' => CatalogoTezController::class,
       'frente' => CatalogoFrenteController::class,
       'ceja' => CatalogoCejasController::class,
       'ojo' => CatalogoOjosController::class,
       'nariz' => CatalogoNarizController::class,
       'boca' => CatalogoBocaController::class,
       'menton' => CatalogoMentonController::class,
       'cara' => CatalogoCaraController::class,
       'registros' => FichaRegistroController::class
   ]);

    Route::post('registros/{registro}/fotografia', [FichaRegistroController::class, 'uploadPicture']);

});

// auth:sanctum
// auth('sanctum')->user(

Route::prefix('auth')->group(function (){
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('/logout', [AuthController::class, 'logout']);
    });
    Route::middleware('guest')->group(function (){
        Route::post('/login', [AuthController::class, 'login']);
    });
});



