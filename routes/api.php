<?php

use App\Modules\Category\Routes\CategoryRoutes;
use App\Modules\City\Routes\CityRoutes;
use App\Modules\Play\Routes\GameRoutes;
use App\Modules\Play\Routes\PlayRoutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API v1 routes
Route::prefix('v1')
    ->as('v1.')
    ->middleware('auth:sanctum')
    ->group(function () {
        CityRoutes::register();
        PlayRoutes::register();
        GameRoutes::register();
        CategoryRoutes::register();
    })
;
