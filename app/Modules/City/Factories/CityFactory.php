<?php

namespace App\Modules\City\Factories;

use App\Modules\City\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * City model factory.
 * 
 * Creates fake city data for testing and seeding.
 *
 * @extends Factory<City>
 */
class CityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<City>
     */
    protected $model = City::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed> The default attributes for the model
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city(),
        ];
    }
}
