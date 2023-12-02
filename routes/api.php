<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GamesController;
use App\Http\Controllers\Api\UserController;

Route::apiResource('games', GamesController::class);

Route::apiResource('users', UserController::class);
