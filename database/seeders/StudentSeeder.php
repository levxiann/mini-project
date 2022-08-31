<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [];
        $faker = Factory::create();

        for($i = 0 ; $i < 100 ; $i++)
        {
            $students[] = [
                'nim' => 'NIM' . ($i+1),
                'nama' => $faker->name(),
                'tanggal_lahir' => $faker->date(),
                'jenis_kelamin' => rand(1, 2),
                'agama' => rand(1, 6),
                'email' => Str::random(10) . '@gmail.com',
                'no_telp' => $faker->numerify('###-###-####'),
                'alamat' => $faker->text(50),
                'semester' => rand(1, 8),
                'kode_jurusan' => 'JURUSAN' . rand(1, 50),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('students')->insert($students);
    }
}
