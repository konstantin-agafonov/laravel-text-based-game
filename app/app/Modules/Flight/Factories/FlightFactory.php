<?php

namespace App\Modules\Flight\Factories;

use App\Modules\Flight\Models\Flight;
use App\Modules\Region\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Фабрика модели полёта.
 *
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FlightFactory extends Factory
{
    /**
     * Имя модели.
     *
     * @var string
     */
    protected $model = Flight::class;

    /**
     * Определение полей модели.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sid'       => $this->faker->uuid(),
            'reg'       => $this->faker->uuid(),
            'dep'       => $this->faker->longitude(28,189) . ' ' . $this->faker->latitude(42,80),
            'dest'      => $this->faker->longitude(28,189) . ' ' . $this->faker->latitude(42,80),
            'eet'       => $this->faker->words(rand(1, 2), true),
            'zona'      => $this->faker->longitude(28,189) . ' ' . $this->faker->latitude(42,80),
            'typ'       => $this->faker->words(rand(1, 2), true),
            'dof'       => $this->faker->date(),
            'dep_time'  => $this->faker->time(),
            'arr_time'  => $this->faker->time(),
            'region_id' => Region::inRandomOrder()->first()->id,
        ];
    }
}
