<?php

namespace App\Modules\Play\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Game relationships trait.
 *
 * Defines relationships for the Game model.
 *
 * @property User $user User
 */
trait GameRelationsTrait
{
    /**
     * Get the game's user.
     *
     * @return BelongsTo The user relationship
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
