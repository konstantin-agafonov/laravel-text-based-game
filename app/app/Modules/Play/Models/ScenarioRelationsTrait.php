<?php

namespace App\Modules\Play\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * City relationships trait.
 *
 * @property Collection<Tour> $tours Tours
 * @property Collection<Offer> $offers Offers
 */
trait ScenarioRelationsTrait
{
    /**
     * Returns relationship with tours.
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
     * Returns relationship with offers.
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
