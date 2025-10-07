<?php

namespace App\Modules\Region\Http\Resources;

use App\Modules\City\Http\Resources\CityResource;
use App\Modules\Region\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Класс ресурса региона.
 *
 * @property int $id Идентификатор региона
 * @property string $name Название региона
 */
class RegionResource extends JsonResource
{
    /**
     * Преобразовывает ресурс в массив.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this['name'],
            'type'          => $this['type'],
            'type_short'    => $this['type_short'],
            'okato'         => $this['okato'],
            'oktmo'         => $this['oktmo'],
            'code'          => $this['code'],
            'iso_3166-2'    => $this['iso_3166-2'],
            'population'    => $this['population'],
            'year_founded'  => $this['year_founded'],
            'fullname'      => $this['fullname'],
            'name_en'       => $this['name_en'],
            'district'      => $this['district'],
            'capital'       => CityResource::make($this->capital),
            'image'         => $this->getFirstMedia(Region::MAIN_MEDIA_COLLECTION)->getUrl(),
        ];
    }
}
