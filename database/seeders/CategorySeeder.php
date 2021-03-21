<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    private $categories = [
        'italian', 'french', 'chinese', 'american', 'unhealthy', 'healthy', 'main', 'desserts'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}
