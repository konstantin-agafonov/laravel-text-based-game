<?php

namespace App\Modules\Category\Routes;

use App\Modules\Category\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/**
 * Category routes configuration.
 *
 * Defines API routes for Category-related operations.
 */
class CategoryRoutes
{
    /**
     * Register Category routes.
     *
     * @return void
     */
    public static function register(): void
    {
        Route::name('category.')->group(function () {
            Route::apiResource('category', CategoryController::class)
                ->only(['index', 'show'])
                ->names([
                    'index' => 'index',
                    'show' => 'show',
                ]);
        });
    }
}
