<?php

namespace App\Modules\Play\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Move relationships trait.
 *
 * Defines relationships for the Move model.
 */
trait MoveRelationsTrait
{
    /**
     * Get the move's game run.
     *
     * @return BelongsTo The game run relationship
     */
    public function gameRun(): BelongsTo
    {
        return $this->belongsTo(GameRun::class);
    }
}


