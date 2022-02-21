<?php

use App\Modules\Widgets\Controllers\WidgetsController;

// authenticated only via API
Route::middleware(['auth:sanctum'])->group(function () {
	
	// dashboard widget
	Route::post('/widgets', WidgetsController::class);
});
