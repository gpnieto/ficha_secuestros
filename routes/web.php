<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'auth:sanctum', 'guest'])->get('/', function () {
    return view('welcome');
});
