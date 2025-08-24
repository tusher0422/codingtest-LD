<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ShortenUrlController;


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/shorten-url', [ShortenUrlController::class, 'shortenUrl']);
});

Route::get('/redirect/{shortCode}', [ShortenUrlController::class, 'redirect']);
