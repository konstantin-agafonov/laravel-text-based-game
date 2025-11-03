<?php

namespace App\Modules\Play\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use App\Modules\Play\Casts\GameRunStatusCast;
use App\Modules\Play\Enums\GameRunStatus;
use Carbon\Carbon;

/**
 * Game run model.
 *
 * Represents a game scenario run by a player user.
 *
 * @property int $id Game run identifier
 * @property GameRunStatus $status Game run status
 * @property int $game_id Game identifier
 * @property int $user_id Game player identifier
 * @property Carbon $started_at Start timestamp
 * @property Carbon $finished_at Finish timestamp
 * @property Carbon $created_at Creation timestamp
 * @property Carbon $updated_at Last update timestamp
 */
class GameRun extends BaseModel
{
    use GameRunRelationsTrait,
        GameRunScopesTrait,
        HasRemovableGlobalScopes;

    protected $table = 'gameruns';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'game_id',
        'user_id',
        'started_at',
        'finished_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => GameRunStatusCast::class,
    ];
}
