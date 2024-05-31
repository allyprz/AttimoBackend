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
        // General Courses
        Group::create(['courses_id' => 1, 'number' => 1]); // Humanities

        // Computer Science's Courses
        Group::create(['courses_id' => 2, 'number' => 1]); // Data Analysis
        Group::create(['courses_id' => 3, 'number' => 1]); // Advanced Web Development

        // Medicine's Courses
        Group::create(['courses_id' => 4, 'number' => 1]); // Anatomy and Physiology
        Group::create(['courses_id' => 5, 'number' => 1]); // Pathology

        // Architecture's Courses
        Group::create(['courses_id' => 6, 'number' => 1]); // Architectural Design
        Group::create(['courses_id' => 7, 'number' => 1]); // History of Architecture

        // Biology's Courses
        Group::create(['courses_id' => 8, 'number' => 1]); // Molecular Biology
        Group::create(['courses_id' => 9, 'number' => 1]); // Ecology and Environmental Biology
    }
}
