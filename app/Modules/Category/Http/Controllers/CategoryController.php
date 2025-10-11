<?php

namespace App\Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Http\Resources\CategoryCollection;
use App\Modules\Category\Http\Resources\CategoryResource;
use App\Modules\Category\Models\Category;

/**
 * Categories controller.
 *
 * Handles HTTP requests for category-related operations including
 * listing, viewing, creating, updating, and deleting categories.
 */
class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
    }

    /**
     * Display a listing of categories.
     *
     * @return CategoryCollection A collection of category resources
     */
    public function index(): CategoryCollection
    {
        return CategoryCollection::make(Category::orderBy('name')->get());
    }

    /**
     * Display the specified Category.
     *
     * @param Category $Category The Category model instance
     * @return CategoryResource The Category resource
     */
    public function show(Category $Category): CategoryResource
    {
        return new CategoryResource($Category);
    }
}
