<?php

namespace App\Modules\Play\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use App\Modules\City\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Scenario model.
 *
 * Represents a game scenario with geographical and administrative information.
 *
 * @property int $id Scenario identifier
 * @property string $name Scenario name
 * @property string|null $name_alt Alternative scenario name
 * @property string|null $okato OKATO code (Russian classification)
 * @property string|null $oktmo OKTMO code (Russian classification)
 * @property bool|null $is_dual_name Whether the scenario has dual naming
 * @property bool|null $is_capital Whether the scenario is a capital
 * @property string|null $zip Postal code
 * @property string|null $population Scenario population
 * @property string|null $year_founded Year the scenario was founded
 * @property string|null $name_en English name of the scenario
 * @property string|null $lat Latitude coordinate
 * @property string|null $lon Longitude coordinate
 * @property \Carbon\Carbon $created_at Creation timestamp
 * @property \Carbon\Carbon $updated_at Last update timestamp
 * @property \Carbon\Carbon|null $deleted_at Soft deletion timestamp
 */
class Scenario extends BaseModel
{
    use ScenarioRelationsTrait,
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
