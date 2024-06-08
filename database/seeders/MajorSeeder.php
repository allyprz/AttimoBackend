<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // John is the administrator/coordinator of all majors
        Major::create(['name' => 'Computer Science', 'code' => 'CS', 'users_id' => 1]);
        Major::create(['name' => 'Medicine', 'code' => 'MED', 'users_id' => 1]);
        Major::create(['name' => 'Architecture', 'code' => 'ARC', 'users_id' => 1]);
        Major::create(['name' => 'Biology', 'code' => 'BIO', 'users_id' => 1]);
    }
}
