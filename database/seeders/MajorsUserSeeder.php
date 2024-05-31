<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\MajorsUser;

class MajorsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Administradores (users_type 3)
        MajorsUser::create(['users_id' => 1, 'majors_id' => 1]); // John - Computer Science

        // Estudiantes (users_type 1)
        MajorsUser::create(['users_id' => 2, 'majors_id' => 1]); // Peter - Computer Science
        MajorsUser::create(['users_id' => 3, 'majors_id' => 1]); // Mary - Computer Science
        MajorsUser::create(['users_id' => 4, 'majors_id' => 2]); // Anna - Medicine
        MajorsUser::create(['users_id' => 5, 'majors_id' => 4]); // Charles - Biology
        MajorsUser::create(['users_id' => 6, 'majors_id' => 3]); // Laura - Architecture
        MajorsUser::create(['users_id' => 7, 'majors_id' => 1]); // George - Computer Science
        MajorsUser::create(['users_id' => 8, 'majors_id' => 2]); // Elena - Medicine
        MajorsUser::create(['users_id' => 9, 'majors_id' => 4]); // Paul - Biology
        MajorsUser::create(['users_id' => 10, 'majors_id' => 3]); // Sophia - Architecture

        // Profesores (users_type 2)
        MajorsUser::create(['users_id' => 11, 'majors_id' => 2]); // Karl - Medicine
        MajorsUser::create(['users_id' => 12, 'majors_id' => 1]); // Pamm - Computer Science
        MajorsUser::create(['users_id' => 13, 'majors_id' => 3]); // Peter - Architecture
        MajorsUser::create(['users_id' => 14, 'majors_id' => 4]); // Betta - Biology
        MajorsUser::create(['users_id' => 15, 'majors_id' => 4]); // Lewis - Biology
    }
}
