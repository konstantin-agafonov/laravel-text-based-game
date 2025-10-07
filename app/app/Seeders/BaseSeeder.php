<?php

namespace App\Seeders;

use Illuminate\Database\Seeder;

/**
 * Базовый класс сидера.
 */
abstract class BaseSeeder extends Seeder
{
    /**
     * Имя модели.
     *
     * @var string
     */
    public string $model;

    /**
     * Признак очищения таблицы в начале работы сидера.
     *
     * @var bool
     */
    public bool $clear = false;

    /**
     * Запускает выполнение.
     *
     * @return void
     */
    public function run(): void
    {
        if ($this->clear) {
            $this->clear();
        }
        $this->create();
    }

    /**
     * Создаёт записи.
     *
     * @return void
     */
    protected function create(): void
    {
        $this->model::factory(100)->create();
    }

    /**
     * Очищает сиды.
     *
     * @return void
     */
    private function clear(): void
    {
        $this->model::truncate();
    }
}
