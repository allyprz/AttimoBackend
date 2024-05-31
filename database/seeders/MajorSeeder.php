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
        Major::create(['name' => 'Computer Science', 'code' => 'CS']);
        Major::create(['name' => 'Civil Engineering', 'code' => 'CE']);
        Major::create(['name' => 'Medicine', 'code' => 'MED']);
        Major::create(['name' => 'Law', 'code' => 'LAW']);
        Major::create(['name' => 'Economics', 'code' => 'ECO']);
        Major::create(['name' => 'Psychology', 'code' => 'PSY']);
        Major::create(['name' => 'Architecture', 'code' => 'ARC']);
        Major::create(['name' => 'Biology', 'code' => 'BIO']);
        Major::create(['name' => 'Chemistry', 'code' => 'CHE']);
        Major::create(['name' => 'Physics', 'code' => 'PHY']);
        Major::create(['name' => 'Mathematics', 'code' => 'MAT']);
        Major::create(['name' => 'Mechanical Engineering', 'code' => 'ME']);
        Major::create(['name' => 'Electrical Engineering', 'code' => 'EE']);
        
    }
}
