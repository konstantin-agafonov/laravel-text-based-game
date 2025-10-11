<?php

namespace App\Modules\Play\Factories;

use App\Modules\Play\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Game model factory.
 *
 * Creates fake scenario data for testing and seeding.
 *
 * @extends Factory<Game>
 */
class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Game>
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed> The default attributes for the model
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'user_id' => 1,
        ];
    }
}
