<?php

namespace App\Modules\Statistics\Routes;

use App\Modules\Statistics\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

/**
 * Роуты для статистики.
 */
class StatisticsRoutes
{
    /**
     * Регистрация роутов.
     */
    public static function register(): void
    {
        Route::prefix('statistics')->group(function () {
            Route::get('region/{region}', [StatisticsController::class, 'getRegionStatistics']);
        });
    }
}
