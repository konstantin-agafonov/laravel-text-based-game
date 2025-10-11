<?php

namespace App\Models;

use App\Modules\Play\Models\Game;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * User relationships trait.
 *
 * Defines relationships for the User model.
 *
 * @property Collection<Game> $games Offers
 */
trait UserRelationsTrait
{
    /**
     * Get the games relationship.
     *
     * @return HasMany The games relationship
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
