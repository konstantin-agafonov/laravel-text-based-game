<?php

namespace App\Modules\City\Seeders;

use App\Modules\City\Models\City;
use App\Seeders\BaseSeeder;
use Illuminate\Support\Facades\File;

/**
 * City seeder class.
 * 
 * Seeds the cities table with data from JSON file.
 */
class CitySeeder extends BaseSeeder
{
    /**
     * The model class name to seed.
     *
     * @var string
     */
    public string $model = City::class;

    /**
     * Create city records from JSON data.
     *
     * @return void
     */
    protected function create(): void
    {
        $cities = File::json(storage_path('seeders/cities.json'));

        foreach ($cities as $city) {
            City::firstOrCreate([
                'name' => $city['name'],
            ],[
                'name_alt'     => $city['name_alt'],
                'okato'        => $city['okato'],
                'oktmo'        => $city['oktmo'],
                'is_dual_name' => $city['isDualName'],
                'is_capital'   => $city['isCapital'],
                'zip'          => $city['zip'],
                'population'   => $city['population'],
                'year_founded' => $city['yearFounded'],
                'name_en'      => $city['name_en'],
                'lat'          => $city['coords']['lat'],
                'lon'          => $city['coords']['lon'],
            ]);
        }
    }
}
