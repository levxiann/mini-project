<?php

namespace Database\Seeders;

use Faker\Factory;
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
        $users = [];
        $faker = Factory::create();

        for($i = 0 ; $i < 10 ; $i++)
        {
            $users[] = [
                'name' => $faker->name(),
                'username' => $faker->firstName(),
                'email' => $faker->email(),
                'password' => Hash::make('12345678'),
                'role' => rand(1, 2),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('users')->insert($users);
    }
}
