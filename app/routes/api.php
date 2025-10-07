<?php

use App\Modules\City\Routes\CityRoutes;
use App\Modules\Flight\Routes\FlightRoutes;
use App\Modules\Region\Routes\RegionRoutes;
use App\Modules\Statistics\Routes\StatisticsRoutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Маршруты городов
CityRoutes::register();

// Маршруты регионов
RegionRoutes::register();

// Маршруты полётов
FlightRoutes::register();

// Маршруты статистики
StatisticsRoutes::register();
