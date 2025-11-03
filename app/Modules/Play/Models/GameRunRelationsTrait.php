<?php

namespace App\Modules\Play\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Game run relationships trait.
 *
 * Defines relationships for the GameRun model.
 *
 * @property User $user User
 */
trait GameRunRelationsTrait
{
    /**
     * Get the game run's user.
     *
     * @return BelongsTo The user relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the game run's game.
     *
     * @return BelongsTo The game relationship
     */
    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Get the game run's moves.
     *
     * @return HasMany The moves relationship
     */
    public function moves(): HasMany
    {
        return $this->hasMany(Move::class);
    }
}
