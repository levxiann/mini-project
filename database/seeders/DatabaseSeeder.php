<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(FacultySeeder::class);
        $this->call(MajorSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(StudentLessonSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
