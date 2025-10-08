<?php

namespace App\Seeders;

use Illuminate\Database\Seeder;

/**
 * Base seeder class.
 */
abstract class BaseSeeder extends Seeder
{
    /**
     * Model name.
     *
     * @var string
     */
    public string $model;

    /**
     * Flag to clear table at the beginning of seeder work.
     *
     * @var bool
     */
    public bool $clear = false;

    /**
     * Runs execution.
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
     * Creates records.
     *
     * @return void
     */
    protected function create(): void
    {
        $this->model::factory(100)->create();
    }

    /**
     * Clears seeds.
     *
     * @return void
     */
    private function clear(): void
    {
        $this->model::truncate();
    }
}
