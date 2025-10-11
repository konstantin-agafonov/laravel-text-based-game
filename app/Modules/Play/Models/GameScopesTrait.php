<?php declare(strict_types=1);

namespace App\Modules\Play\Models;

use Illuminate\Database\Eloquent\Builder;

/**
 * Scopes trait for Game model.
 *
 * @method static byUserID(int $userID)
 */
trait GameScopesTrait
{
    /**
     * Search by user ID scope.
     *
     * @param Builder $query Request
     * @param int $userID User ID
     * @return Builder
     */
    public function scopeByUserID(Builder $query, int $userID): Builder
    {
        return $query->where('user_id', $userID);
    }
}
