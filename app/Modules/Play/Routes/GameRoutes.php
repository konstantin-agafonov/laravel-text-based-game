<?php

namespace App\Modules\Play\Routes;

use App\Modules\City\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

/**
 * Game routes configuration.
 *
 * Defines API routes for game-related operations.
 */
class GameRoutes
{
    /**
     * Register game routes.
     *
     * @return void
     */
    public static function register(): void
    {
        Route::name('game.')->group(function () {
            Route::apiResource('game', CityController::class)
                ->names([
                    'index' => 'index',
                    'show' => 'show',
                ]);
        });
    }
}
