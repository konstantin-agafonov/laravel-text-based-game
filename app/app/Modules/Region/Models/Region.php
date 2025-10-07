<?php

namespace App\Modules\Region\Models;

use App\Models\BaseModel;
use App\Models\HasRemovableGlobalScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Модель города.
 *
 * @property int $id Идентификатор региона
 * @property string $name Название региона
 */
class Region extends BaseModel implements HasMedia
{
    use RegionRelationsTrait,
        HasFactory,
        HasRemovableGlobalScopes,
        InteractsWithMedia;

    /**
     * @var string Имя коллекции основного фото.
     */
    public const MAIN_MEDIA_COLLECTION = 'main';

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
        'capital_city_id'
    ];

    /**
     * Регистрация коллекций.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(self::MAIN_MEDIA_COLLECTION)->singleFile();
    }
}
