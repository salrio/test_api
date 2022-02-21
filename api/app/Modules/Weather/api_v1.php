<?php

use App\Modules\Weather\Controllers\WeatherController;

Route::get('/weather', WeatherController::class);

Route::get('/weather/getVenues/{city}', [WeatherController::class, 'getVenues']);

