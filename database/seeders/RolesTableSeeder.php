<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();

        DB::table('roles')->insert(['name' => 'Admin','guard_name' => 'web']);
        DB::table('roles')->insert(['name' => 'Manager','guard_name' => 'web']);
        DB::table('roles')->insert(['name' => 'Brand','guard_name' => 'web']);
        DB::table('roles')->insert(['name' => 'User','guard_name' => 'web']);
    }
}
