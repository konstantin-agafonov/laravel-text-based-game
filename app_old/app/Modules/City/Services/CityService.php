<?php declare(strict_types=1);

namespace App\Modules\City\Services;

use App\Modules\City\Models\City;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * City service.
 * 
 * Handles business logic for city-related operations.
 */
class CityService
{

    /**
     * Get a paginated list of cities.
     *
     * @return LengthAwarePaginator Paginated collection of cities
     */
    public function getCities(): LengthAwarePaginator
    {
        return City::orderBy('name')->paginate(100);
    }
}
