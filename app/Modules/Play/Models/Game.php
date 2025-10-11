<?php

namespace App\Modules\Play\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        HasFactory,
        HasRemovableGlobalScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
