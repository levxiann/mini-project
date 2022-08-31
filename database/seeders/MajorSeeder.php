<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [];
        $faker = Factory::create();

        for($i = 0 ; $i < 50 ; $i++)
        {
            $majors[] = [
                'kode_jurusan' => 'JURUSAN' . ($i+1),
                'nama_jurusan' => $faker->text(30),
                'kode_fakultas' => 'FAKULTAS' . rand(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('majors')->insert($majors);
    }
}
