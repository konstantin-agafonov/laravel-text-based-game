<?php

namespace App\Modules\Play\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use App\Modules\Play\Casts\GameStatusCast;
use Carbon\Carbon;

/**
 * Game model.
 *
 * Represents a game scenario created by a user.
 *
 * @property int $id Game identifier
 * @property string $name Game name
 * @property Carbon $created_at Creation timestamp
 * @property Carbon $updated_at Last update timestamp
 */
class Game extends BaseModel
{
    use GameRelationsTrait,
        GameScopesTrait,
        HasRemovableGlobalScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'user_id',
        'category_id',
        'scenario',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'scenario' => 'array',
        'status' => GameStatusCast::class,
    ];
}
