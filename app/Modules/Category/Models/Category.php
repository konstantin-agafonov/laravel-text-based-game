<?php

namespace App\Modules\Category\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use Carbon\Carbon;

/**
 * Category model.
 *
 * Represents a Category entity.
 *
 * @property int $id Category identifier
 * @property string $name Category name
 * @property Carbon $created_at Creation timestamp
 * @property Carbon $updated_at Last update timestamp
 */
class Category extends BaseModel
{
    use CategoryRelationsTrait,
        HasRemovableGlobalScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
