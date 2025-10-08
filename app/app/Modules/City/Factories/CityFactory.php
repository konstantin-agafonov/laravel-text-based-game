<?php

namespace App\Modules\City\Factories;

use App\Modules\City\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * City model factory.
 */
class CityFactory extends Factory
{
    /**
     * Model name.
     *
     * @var string
     */
    protected $model = City::class;

    /**
     * Model field definition.
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
