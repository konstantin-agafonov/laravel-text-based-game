<?php

namespace App\Modules\Region\Routes;

use App\Modules\Region\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;

/**
 * Роуты для регионов.
 */
class RegionRoutes
{
    /**
     * Регистрация роутов.
     */
    public static function register(): void
    {
        Route::apiResource('region', RegionController::class);
    }
}
