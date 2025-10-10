<?php

namespace App\Seeders;

use Illuminate\Database\Seeder;

/**
 * Base seeder class.
 * 
 * Provides common functionality for all application seeders.
 */
abstract class BaseSeeder extends Seeder
{
    /**
     * The model class name to seed.
     *
     * @var string
     */
    public string $model;

    /**
     * Whether to clear the table before seeding.
     *
     * @var bool
     */
    public bool $clear = false;

    /**
     * Run the database seeders.
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
     * Create the model records.
     *
     * @return void
     */
    protected function create(): void
    {
        $this->model::factory(100)->create();
    }

    /**
     * Clear existing records from the table.
     *
     * @return void
     */
    private function clear(): void
    {
        $this->model::truncate();
    }
}
