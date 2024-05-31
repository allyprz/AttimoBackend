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
        Major::create(['name' => 'Medicine', 'code' => 'MED']);
        Major::create(['name' => 'Architecture', 'code' => 'ARC']);
        Major::create(['name' => 'Biology', 'code' => 'BIO']);
    }
}
