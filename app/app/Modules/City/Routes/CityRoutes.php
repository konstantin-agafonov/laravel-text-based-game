<?php

namespace App\Modules\City\Routes;

use App\Modules\City\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

/**
 * Роуты для городов.
 */
class CityRoutes
{
    /**
     * Регистрация роутов.
     */
    public static function register(): void
    {
        Route::apiResource('city', CityController::class)
            ->only(['index', 'show']);
    }
}
