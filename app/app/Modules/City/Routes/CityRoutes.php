<?php

namespace App\Modules\City\Routes;

use App\Modules\City\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

/**
 * Routes for cities.
 */
class CityRoutes
{
    /**
     * Route registration.
     */
    public static function register(): void
    {
        Route::apiResource('city', CityController::class)
            ->only(['index', 'show']);
    }
}
