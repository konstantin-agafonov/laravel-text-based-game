<?php declare(strict_types=1);

namespace App\Modules\Flight\Models;

use App\Modules\Region\Models\Region;
use Illuminate\Database\Eloquent\Builder;

/**
 * Трейт скоупов для сущности полётов.
 *
 * @method static valid()
 * @method static regionScope(Region $region)
 */
trait FlightScopesTrait
{

    /**
     * Скоуп валидности.
     *
     * @param Builder $query Запрос
     * @return Builder
     */
    public function scopeValid(Builder $query): Builder
    {
        return $query
            ->whereNotNull('dep')
            ->whereNotNull('dest')
            ->whereNotNull('dof')
            ->whereNotNull('dep_time')
            ->whereNotNull('arr_time')
        ;
    }

    /**
     * Скоуп региона.
     *
     * @param Builder $query Запрос
     * @param Region $region
     * @return Builder
     */
    public function scopeRegionScope(Builder $query, Region $region): Builder
    {
        return $query->where('region_id', $region->id);
    }
}
