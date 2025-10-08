<?php declare(strict_types=1);

namespace App\Modules\City\Services;

use App\Modules\City\Models\City;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * City service.
 */
class CityService
{

    /**
     * Returns cities.
     *
     * @return LengthAwarePaginator
     */
    public function getCities(): LengthAwarePaginator
    {
        return City::orderBy('name')->paginate(100);
    }
}
