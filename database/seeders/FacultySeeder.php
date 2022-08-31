<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [];
        $faker = Factory::create();

        for($i = 0 ; $i < 10 ; $i++)
        {
            $faculties[] = [
                'kode_fakultas' => 'FAKULTAS' . ($i+1),
                'nama_fakultas' => $faker->text(30),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('faculties')->insert($faculties);
    }
}
