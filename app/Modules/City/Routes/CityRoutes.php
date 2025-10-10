<?php

namespace App\Modules\City\Routes;

use App\Modules\City\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

/**
 * City routes configuration.
 * 
 * Defines API routes for city-related operations.
 */
class CityRoutes
{
    /**
     * Register city routes.
     *
     * @return void
     */
    public static function register(): void
    {
        Route::name('city.')->group(function () {
            Route::apiResource('city', CityController::class)
                ->only(['index', 'show'])
                ->names([
                    'index' => 'index',
                    'show' => 'show',
                ]);
        });
    }
}
