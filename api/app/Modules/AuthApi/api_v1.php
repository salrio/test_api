<?php

use App\Modules\AuthApi\Controllers\AuthApiController;

// Authenticated
Route::middleware(['auth:sanctum'])->group(function () {
	Route::post('/auth/logout', [AuthApiController::class, 'logout']);
});

// Auth: Open Routes
Route::get('/auth', [AuthApiController::class, 'appApi']);
Route::post('/auth/register', [AuthApiController::class, 'register']);
Route::post('/auth/login', [AuthApiController::class, 'login']);

