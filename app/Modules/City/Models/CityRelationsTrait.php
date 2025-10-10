<?php

namespace App\Modules\City\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * City relationships trait.
 * 
 * Defines relationships for the City model.
 *
 * @property Collection<Tour> $tours Tours
 * @property Collection<Offer> $offers Offers
 */
trait CityRelationsTrait
{
    /**
     * Get the tours relationship.
     *
     * @return HasMany The tours relationship
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
     * Get the offers relationship.
     *
     * @return BelongsToMany The offers relationship
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
