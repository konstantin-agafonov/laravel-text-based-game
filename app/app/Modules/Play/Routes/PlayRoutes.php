<?php

namespace App\Modules\Play\Routes;

use App\Modules\Play\Http\Controllers\PlayController;
use Illuminate\Support\Facades\Route;

/**
 * Play routes configuration.
 * 
 * Defines API routes for play-related operations.
 */
class PlayRoutes
{
    /**
     * Register play routes.
     *
     * @return void
     */
    public static function register(): void
    {
        Route::get('play', [PlayController::class, 'play'])->name('play');
    }
}
