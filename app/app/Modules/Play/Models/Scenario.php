<?php

namespace App\Modules\Play\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use App\Modules\City\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Модель сценария.
 *
 * @property int $id Идентификатор города
 * @property string $name Название города
 */
class Scenario extends BaseModel
{
    use ScenarioRelationsTrait,
        HasFactory,
        HasRemovableGlobalScopes;

    /**
     * Заполняемые поля.
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
     * Приводимые поля.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Создает экземпляр фабрики.
     *
     * @return CityFactory
     */
    protected static function newFactory(): CityFactory
    {
        return CityFactory::new();
    }
}
