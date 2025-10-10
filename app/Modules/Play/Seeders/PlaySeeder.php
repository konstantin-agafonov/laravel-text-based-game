<?php

namespace App\Modules\Play\Seeders;

use App\Modules\City\Models\City;
use App\Seeders\BaseSeeder;
use Illuminate\Support\Facades\File;

/**
 * Play seeder class.
 * 
 * Seeds the play data from JSON file.
 */
class PlaySeeder extends BaseSeeder
{
    /**
     * The model class name to seed.
     *
     * @var string
     */
    public string $model = City::class;

    /**
     * Create play records from JSON data.
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
