<?php

namespace App\Modules\Region\Models;

use App\Modules\City\Models\City;
use App\Modules\Flight\Models\Flight;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Трейт связей региона.
 *
 * @property City $capital Столица
 * @property HasMany $flights Полёты
 */
trait RegionRelationsTrait
{

    /**
     * Возвращает связь со столицей.
     *
     * @return HasOne
     */
    public function capital(): HasOne
    {
        return $this->hasOne(City::class,"id","capital_city_id");
    }

    /**
     * Возвращает связь с полётами.
     *
     * @return HasMany
     */
    public function flights(): HasMany
    {
        return $this->hasMany(Flight::class);
    }
}
