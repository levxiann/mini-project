<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students_lessons = [];
        $faker = Factory::create();

        for($i = 0 ; $i < 200 ; $i++)
        {
            $students_lessons[] = [
                'nim' => 'NIM' . rand(1, 100),
                'kode_matkul' => 'MATKUL' . rand(1, 100),
                'semester' => rand(1,8),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('students_lessons')->insert($students_lessons);
    }
}
