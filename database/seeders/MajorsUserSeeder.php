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
        // John pertenece a Computer Science
        MajorsUser::create(['users_id' => 1, 'majors_id' => 1]);

        // Mary pertenece a Medicine
        MajorsUser::create(['users_id' => 2, 'majors_id' => 2]);

        // Peter pertenece a Architecture
        MajorsUser::create(['users_id' => 3, 'majors_id' => 3]);

        // Anna pertenece a Medicine
        MajorsUser::create(['users_id' => 4, 'majors_id' => 2]);

        // Charles pertenece a Architecture
        MajorsUser::create(['users_id' => 5, 'majors_id' => 3]);

        // Laura pertenece a Biology
        MajorsUser::create(['users_id' => 6, 'majors_id' => 4]);

        // George pertenece a Computer Science
        MajorsUser::create(['users_id' => 7, 'majors_id' => 1]);

        // Elena pertenece a Biology
        MajorsUser::create(['users_id' => 8, 'majors_id' => 4]);

        // Paul pertenece a Architecture
        MajorsUser::create(['users_id' => 9, 'majors_id' => 3]);

        // Sophia pertenece a Medicine
        MajorsUser::create(['users_id' => 10, 'majors_id' => 2]);
    }
}
