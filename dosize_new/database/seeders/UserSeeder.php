<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            User::truncate();
            // DB::table('roles')->truncate();

            $adminRole = DB::table('roles')->where('name','Admin')->first();

            $managerRole = DB::table('roles')->where('name','Manager')->first();
            $brandRole = DB::table('roles')->where('name','Brand')->first();
            $userRole = DB::table('roles')->where('name','User')->first();

            $admin = User::create([
                'name' => 'Admin Name',
                'email' => 'admin@gmail.com',
                'status' => '1',
                'city_id' => '1',
                'password' => Hash::make('password1')
            ]);

            $manager = User::create([
                'name' => 'Manager Name',
                'email' => 'manager@gmail.com',
                'status' => '0',
                'city_id' => '1',
                'password' => Hash::make('password1')
            ]);

            $brand = User::create([
                'name' => 'Brand Name',
                'email' => 'brand@gmail.com',
                'status' => '1',
                'city_id' => '2',
                'password' => Hash::make('password1')
            ]);

            $user = User::create([
                'name' => 'User Name',
                'email' => 'user@gmail.com',
                'status' => '1',
                'city_id' => '2',
                'password' => Hash::make('password1')
            ]);

            
            $admin->assignRole($adminRole->name);
            $manager->assignRole($managerRole->name);
            $brand->assignRole($brandRole->name);
            $user->assignRole($userRole->name);
        }
    }
}
