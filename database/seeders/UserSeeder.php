<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $password = Hash::make('password');
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'type' => $i >= 5 ? 'admin' : 'client',
                'email' => $faker->unique()->email,
                'password' => $password,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
