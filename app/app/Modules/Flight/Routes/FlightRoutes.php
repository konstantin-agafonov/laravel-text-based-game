<?php

namespace App\Modules\Flight\Routes;

use App\Modules\Flight\Http\Controllers\FlightController;
use Illuminate\Support\Facades\Route;

/**
 * Роуты для полётов.
 */
class FlightRoutes
{
    /**
     * Регистрация роутов.
     */
    public static function register(): void
    {
        Route::apiResource('flight', FlightController::class);
    }
}
