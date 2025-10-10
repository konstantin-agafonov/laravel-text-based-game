<?php

namespace App\Modules\City\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use App\Modules\City\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * City model.
 *
 * Represents a city entity with geographical and administrative information.
 *
 * @property int $id City identifier
 * @property string $name City name
 * @property string|null $name_alt Alternative city name
 * @property string|null $okato OKATO code (Russian classification)
 * @property string|null $oktmo OKTMO code (Russian classification)
 * @property bool|null $is_dual_name Whether the city has dual naming
 * @property bool|null $is_capital Whether the city is a capital
 * @property string|null $zip Postal code
 * @property string|null $population City population
 * @property string|null $year_founded Year the city was founded
 * @property string|null $name_en English name of the city
 * @property string|null $lat Latitude coordinate
 * @property string|null $lon Longitude coordinate
 * @property \Carbon\Carbon $created_at Creation timestamp
 * @property \Carbon\Carbon $updated_at Last update timestamp
 * @property \Carbon\Carbon|null $deleted_at Soft deletion timestamp
 */
class City extends BaseModel
{
    use CityRelationsTrait,
        HasFactory,
        HasRemovableGlobalScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_dual_name' => 'boolean',
        'is_capital' => 'boolean',
        'population' => 'integer',
    ];

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
