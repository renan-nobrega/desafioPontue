<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\GamesController;


Route::delete('/games/{id}', [GamesController::class, 'destroy']);
Route::patch('/games/{id}', [GamesController::class, 'update']);
Route::get('/games/{id}', [GamesController::class, 'show']);
Route::get('/games', [GamesController::class, 'index']);
Route::post('/games', [GamesController::class, 'store']);

