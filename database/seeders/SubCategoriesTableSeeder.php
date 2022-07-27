<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubCategory::create([
            'name' => 'headphones',
            'sub_category_slug' => 'headphones',
            'category_id' => '1',
        ]);

        SubCategory::create([
            'name' => 'charger',
            'sub_category_slug' => 'charger',
            'category_id' => '1',
        ]);

        SubCategory::create([
            'name' => 't-shirt',
            'sub_category_slug' => 't-shirt',
            'category_id' => '2',
        ]);

        SubCategory::create([
            'name' => 'shirt',
            'sub_category_slug' => 'shirt',
            'category_id' => '2',
        ]);

        SubCategory::create([
            'name' => 'iron',
            'sub_category_slug' => 'iron',
            'category_id' => '3',
        ]);

        SubCategory::create([
            'name' => 'washing mechine',
            'sub_category_slug' => 'washing mechine',
            'category_id' => '3',
        ]);
    }
}
