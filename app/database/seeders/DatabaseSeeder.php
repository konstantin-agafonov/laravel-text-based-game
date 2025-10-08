<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Modules\City\Seeders\CitySeeder;
use Illuminate\Database\Seeder;

/**
 * Main database seeder class.
 * 
 * This class is responsible for calling all other seeders to populate
 * the application's database with initial data.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 
     * @return void
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
        ]);
    }
}
