<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Groups
        Group::create(['courses_id' => 1, 'number' => 1]); // Humanities (id 1)
        Group::create(['courses_id' => 2, 'number' => 1]); // Data Analysis (id 2)
        Group::create(['courses_id' => 3, 'number' => 1]); // Advanced Web Development (id 3)
        Group::create(['courses_id' => 4, 'number' => 1]); // Introduction to Programming (id 4)
        Group::create(['courses_id' => 5, 'number' => 1]); // Computer Security (id 5)
        Group::create(['courses_id' => 6, 'number' => 1]); // Anatomy and Physiology (id 6)
        Group::create(['courses_id' => 7, 'number' => 1]); // Pathology (id 7)
        Group::create(['courses_id' => 8, 'number' => 1]); // Pharmacology (id 8)
        Group::create(['courses_id' => 9, 'number' => 1]); // Clinical Medicine (id 9)
        Group::create(['courses_id' => 10, 'number' => 1]); // Architectural Design (id 10)
        Group::create(['courses_id' => 11, 'number' => 1]); // Building Materials and Construction (id 11)
        Group::create(['courses_id' => 12, 'number' => 1]); // History of Architecture (id 12)
        Group::create(['courses_id' => 13, 'number' => 1]); // Urban Planning (id 13)
        Group::create(['courses_id' => 14, 'number' => 1]); // Molecular Biology (id 14)
        Group::create(['courses_id' => 15, 'number' => 1]); // Ecology and Environmental Biology (id 15)
        Group::create(['courses_id' => 16, 'number' => 1]); // Genetics (id 16)
        Group::create(['courses_id' => 17, 'number' => 1]); // Microbiology (id 17)
    }
}
