<?php

namespace App\Modules\Flight\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use App\Modules\Flight\Factories\FlightFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Модель города.
 *
 * @property int $id Идентификатор города
 * @property string $name Название города
 */
class Flight extends BaseModel
{
    use FlightRelationsTrait,
        HasFactory,
        HasRemovableGlobalScopes,
        FlightScopesTrait;

    /**
     * Заполняемые поля.
     *
     * @var array
     */
    protected $fillable = [
        'sid',
        'reg',
        'dep',
        'dest',
        'eet',
        'zona',
        'typ',
        'dof',
        'folder',
        'dep_time',
        'arr_time',
        'region_id'
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
     * @return FlightFactory
     */
    protected static function newFactory(): FlightFactory
    {
        return FlightFactory::new();
    }
}
