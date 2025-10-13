<?php

namespace App\Modules\Category\Seeders;

use App\Modules\Category\Models\Category;
use App\Seeders\BaseSeeder;

/**
 * Category seeder class.
 *
 * Seeds the categories table with data.
 */
class CategorySeeder extends BaseSeeder
{
    /**
     * The model class name to seed.
     *
     * @var string
     */
    public string $model = Category::class;

    /**
     * Create Category records from JSON data.
     *
     * @return void
     */
    protected function create(): void
    {
        $categories = [
            'Fun',
            'Education',
            'Marketing',
            'Literature',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate([
                'name' => $category,
            ]);
        }
    }
}
