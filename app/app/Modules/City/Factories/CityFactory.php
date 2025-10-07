<?php

namespace App\Modules\City\Factories;

use App\Modules\City\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Фабрика модели города.
 */
class CityFactory extends Factory
{
    /**
     * Имя модели.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Определение полей модели.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city(),
        ];
    }
}
