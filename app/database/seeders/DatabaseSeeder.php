<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Modules\City\Seeders\CitySeeder;
use App\Modules\Flight\Seeders\FlightSeeder;
use App\Modules\Region\Seeders\RegionSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitySeeder::class,
            RegionSeeder::class,
            FlightSeeder::class,
        ]);
    }
}
