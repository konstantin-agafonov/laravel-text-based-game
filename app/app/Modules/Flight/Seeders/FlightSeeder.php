<?php

namespace App\Modules\Flight\Seeders;

use App\Modules\Flight\Models\Flight;
use App\Seeders\BaseSeeder;

/**
 * Класс создания полётов.
 */
class FlightSeeder extends BaseSeeder
{
    /**
     * Имя модели.
     *
     * @var string
     */
    public string $model = Flight::class;

    /**
     * Создаёт записи.
     *
     * @return void
     */
    protected function create(): void
    {
        if (Flight::first()) {
            return;
        }

        $this->model::factory(10000)->create();
    }
}
