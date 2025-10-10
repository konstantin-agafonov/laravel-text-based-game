<?php

namespace App\Modules\City\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use morphos\Russian\GeographicalNamesInflection;

/**
 * City resource class.
 *
 * Transforms city model data into API-friendly format.
 *
 * @property int $id City identifier
 * @property string $name City name
 */
class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request The HTTP request instance
     * @return array<string, mixed> The transformed city data
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'name_alt'      => $this->name_alt,
            'okato'         => $this->okato,
            'oktmo'         => $this->oktmo,
            'is_dual_name'  => $this->is_dual_name,
            'is_capital'    => $this->is_capital,
            'zip'           => $this->zip,
            'population'    => $this->population,
            'year_founded'  => $this->year_founded,
            'name_en'       => $this->name_en,
            'lat'           => $this->lat,
            'lon'           => $this->lon,
            'name_genitive' => GeographicalNamesInflection::getCase($this->name, 'genitive'),
        ];
    }
}
