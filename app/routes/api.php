<?php

use App\Modules\City\Routes\CityRoutes;
use App\Modules\Play\Routes\PlayRoutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Маршруты городов
CityRoutes::register();

PlayRoutes::register();
