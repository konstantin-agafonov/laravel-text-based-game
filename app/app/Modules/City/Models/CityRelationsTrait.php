<?php

namespace App\Modules\City\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Трейт связей города.
 *
 * @property Collection<Tour> $tours Туры
 * @property Collection<Offer> $offers Предложения
 */
trait CityRelationsTrait
{
    /**
     * Возвращает связь с турами.
     *
     * @return HasMany
     */
    /*public function tours(): HasMany
    {
        return $this->hasMany(
            Tour::class,
            'city_id',
            'id'
        );
    }*/

    /**
     * Возвращает связь с предложениями.
     *
     * @return BelongsToMany
     */
    /*public  function offers(): BelongsToMany
    {
        return $this->belongsToMany(
            Offer::class,
            'city_offer',
            'city_id',
            'offer_id'
        )
            ->using(CityOffer::class)
            ->withPivot('id');
    }*/
}
