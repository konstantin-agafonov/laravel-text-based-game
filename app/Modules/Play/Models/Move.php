<?php

namespace App\Modules\Play\Models;

use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Move model.
 *
 * Represents a single move within a game run.
 *
 * @property int $id Move identifier
 * @property int $gamerun_id Game run identifier
 * @property string $scene Scene before move
 * @property string $move Move player input
 * @property Carbon $created_at Creation timestamp
 */
class Move extends BaseModel
{
    use MoveRelationsTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gamerun_id',
        'scene',
        'move',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
