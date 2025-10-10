<?php

namespace App\Modules\Play\Factories;

use App\Modules\Play\Models\Scenario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Scenario model factory.
 *
 * Creates fake scenario data for testing and seeding.
 *
 * @extends Factory<Scenario>
 */
class ScenarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Scenario>
     */
    protected $model = Scenario::class;

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
