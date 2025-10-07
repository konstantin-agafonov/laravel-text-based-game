<?php

namespace App\Modules\Region\Seeders;

use App\Modules\City\Models\City;
use App\Modules\Region\Models\Region;
use App\Seeders\BaseSeeder;
use Illuminate\Support\Facades\File;

/**
 * Класс создания городов.
 */
class RegionSeeder extends BaseSeeder
{
    /**
     * Имя модели.
     *
     * @var string
     */
    public string $model = Region::class;

    /**
     * Создаёт записи.
     *
     * @return void
     */
    protected function create(): void
    {
        $regions = File::json(storage_path('seeders/regions.json'));

        foreach ($regions as $region) {
            $regionModel = Region::firstOrCreate([
                'name' => $region['name'],
            ],[
                'type'          => $region['type'],
                'type_short'    => $region['typeShort'],
                'okato'         => $region['okato'],
                'oktmo'         => $region['oktmo'],
                'code'          => $region['code'],
                'iso_3166-2'    => $region['iso_3166-2'],
                'population'    => $region['population'],
                'year_founded'  => $region['yearFounded'],
                'fullname'      => $region['fullname'],
                'name_en'       => $region['name_en'],
                'district'      => $region['district'],
            ]);

            if ($regionModel->getMedia($this->model::MAIN_MEDIA_COLLECTION)->count() === 0
                && !empty($region['image'])) {

                $filePath = storage_path('seeders/region_images/' . $region['image']);
                if (file_exists($filePath)) {
                    $regionModel->addMedia($filePath)
                        ->preservingOriginal()
                        ->usingName($region['image'])
                        ->usingFileName($region['image'])
                        ->toMediaCollection($this->model::MAIN_MEDIA_COLLECTION);
                }
            }

            if (!empty($region['capital']) && !empty($region['capital']['name'])) {
                $capitalCityModel = City::where('name', $region['capital']['name'])->first();

                if ($capitalCityModel
                    && (!$regionModel->capital()->exists() || $capitalCityModel->id !== $regionModel->capital->id)) {

                    $regionModel->capital_city_id = $capitalCityModel->id;
                    $regionModel->save();
                }
            }
        }
    }
}
