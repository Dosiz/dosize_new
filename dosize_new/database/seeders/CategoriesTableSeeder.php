<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Mobile',
            'category_slug' => 'mobile',
        ]);

        Category::create([
            'name' => 'Clothes',
            'category_slug' => 'clothes',
        ]);

        Category::create([
            'name' => 'Electronics',
            'category_slug' => 'electronics',
        ]);
    }
}
