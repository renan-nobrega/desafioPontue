<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GamesController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;

Route::apiResource('games', GamesController::class)
    ->middleware('auth:sanctum');

Route::apiResource('users', UserController::class)
    ->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('login', [LoginController::class, 'login']);

    Route::post('logout', [LoginController::class, 'logout'])
        ->middleware('auth:sanctum');
});