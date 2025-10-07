<?php declare(strict_types=1);

namespace App\Modules\Region\Services;

use App\Modules\Region\Models\Region;

/**
 * Сервис регионов.
 */
class RegionService
{

    /**
     * Возвращает города.
     *
     */
    public function getRegions()
    {
        return Region::orderBy('name')->get();
    }
}
