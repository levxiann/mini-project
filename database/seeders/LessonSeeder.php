<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = [];
        $faker = Factory::create();

        for($i = 0 ; $i < 100 ; $i++)
        {
            $lessons[] = [
                'kode_matkul' => 'MATKUL' . ($i+1),
                'nama_matkul' => $faker->text(30),
                'sks' => rand(1, 3),
                'kode_jurusan' => 'JURUSAN'. rand(1, 50),
                'semester' => rand(1, 8),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('lessons')->insert($lessons);
    }
}
