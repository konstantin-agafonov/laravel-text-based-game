<?php

namespace App\Modules\Play\Routes;

use App\Modules\Play\Http\Controllers\PlayController;
use Illuminate\Support\Facades\Route;

class PlayRoutes
{
    /**
     * Route registration.
     */
    public static function register(): void
    {
        Route::get('play', [PlayController::class, 'play'])->name('play');
    }
}
