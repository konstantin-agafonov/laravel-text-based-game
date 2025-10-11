<?php

namespace App\Modules\Category\Models;

use App\Modules\Play\Models\Game;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Category relationships trait.
 *
 * Defines relationships for the Category model.
 *
 * @property Collection<Game> $games Games
 */
trait CategoryRelationsTrait
{
    /**
     * Get the game's user.
     *
     * @return HasMany Games relationship
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
