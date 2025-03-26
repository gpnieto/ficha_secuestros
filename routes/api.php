<?php

use App\Http\Controllers\CatalogoSexoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('sexo', CatalogoSexoController::class);

// auth:sanctum
// auth('sanctum')->user()

