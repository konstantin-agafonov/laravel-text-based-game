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
 * @property string|null $name_alt Alternative city name
 * @property string|null $okato OKATO code (Russian classification)
 * @property string|null $oktmo OKTMO code (Russian classification)
 * @property bool|null $is_dual_name Whether the city has dual naming
 * @property bool|null $is_capital Whether the city is a capital
 * @property string|null $zip Postal code
 * @property int|null $population City population
 * @property string|null $year_founded Year the city was founded
 * @property string|null $name_en English name of the city
 * @property string|null $lat Latitude coordinate
 * @property string|null $lon Longitude coordinate
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
