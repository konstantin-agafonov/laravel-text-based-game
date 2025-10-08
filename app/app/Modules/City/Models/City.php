<?php

namespace App\Modules\City\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use App\Modules\City\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * City model.
 *
 * @property int $id City identifier
 * @property string $name City name
 */
class City extends BaseModel
{
    use CityRelationsTrait,
        HasFactory,
        HasRemovableGlobalScopes;

    /**
     * Fillable fields.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'name_alt',
        'okato',
        'oktmo',
        'is_dual_name',
        'is_capital',
        'zip',
        'population',
        'year_founded',
        'name_en',
        'lat',
        'lon',
    ];

    /**
     * Cast fields.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Creates a factory instance.
     *
     * @return CityFactory
     */
    protected static function newFactory(): CityFactory
    {
        return CityFactory::new();
    }
}
