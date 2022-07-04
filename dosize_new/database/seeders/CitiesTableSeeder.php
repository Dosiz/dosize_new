<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'name' => 'Islamabad',
            'image' => '103451.png',
        ]);

        City::create([
            'name' => 'Rawalpindi',
            'image' => '103452.png',
        ]);

        City::create([
            'name' => 'Lahore',
            'image' => '103453.png',
        ]);

    }
}
