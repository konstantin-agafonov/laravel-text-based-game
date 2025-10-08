<?php

use App\Modules\City\Routes\CityRoutes;
use App\Modules\Play\Routes\PlayRoutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API v1 routes
Route::prefix('v1')->as('v1.')->group(function () {
    // City routes
    CityRoutes::register();

    // Play routes
    PlayRoutes::register();
});
