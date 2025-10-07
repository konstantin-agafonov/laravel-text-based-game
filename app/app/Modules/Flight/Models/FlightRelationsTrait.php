<?php

namespace App\Modules\Flight\Models;

use App\Modules\Region\Models\Region;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Трейт связей.
 *
 * @property Region $region Регион
 */
trait FlightRelationsTrait
{
    /**
     * Возвращает связь с регионом.
     *
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
