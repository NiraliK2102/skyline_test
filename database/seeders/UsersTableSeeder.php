<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Let's clear the users table first
        // users::truncate();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        $password = Hash::make('skyline');

        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);
        

        // And now let's generate a few dozen users for our app:
        // for ($i = 0; $i < 5; $i++) {
        //     DB::table('users')->insert([
        //         'name' => $faker->name,
        //         'email' => $faker->email,
        //         'password' => $password,
        //     ]);
        // }
    }
}
