<?php

namespace App\Modules\Play\Factories;

use App\Modules\City\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Scenario model factory.
 */
class ScenarioFactory extends Factory
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
