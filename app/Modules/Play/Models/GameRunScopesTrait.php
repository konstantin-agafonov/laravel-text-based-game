<?php declare(strict_types=1);

namespace App\Modules\Play\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Scopes trait for GameRun model.
 *
 * @method static byUserAndGameID(int $userID, int $gameID)
 */
trait GameRunScopesTrait
{
    /**
     * Search by user ID and game ID scope.
     *
     * @param Builder $query Request
     * @param int $userID User ID
     * @param int $gameID Game ID
     * @return Builder
     */
    public function scopeByUserAndGameID(Builder $query, int $userID, int $gameID): Builder
    {
        return $query
            ->where('user_id', $userID)
            ->where('game_id', $gameID)
        ;
    }
}
