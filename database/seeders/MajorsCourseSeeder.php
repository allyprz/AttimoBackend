<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MajorsCourse;

class MajorsCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Humanities (id 1) belongs to all majors
        MajorsCourse::create(['majors_id' => 1, 'courses_id' => 1]);
        MajorsCourse::create(['majors_id' => 2, 'courses_id' => 1]);
        MajorsCourse::create(['majors_id' => 3, 'courses_id' => 1]);
        MajorsCourse::create(['majors_id' => 4, 'courses_id' => 1]);

        // Computer Science's Courses
        MajorsCourse::create(['majors_id' => 1, 'courses_id' => 2]); // Data Analysis (id 2)
        MajorsCourse::create(['majors_id' => 1, 'courses_id' => 3]); // Advanced Web Development (id 3)

        // Medicine's Courses
        MajorsCourse::create(['majors_id' => 2, 'courses_id' => 4]); // Anatomy and Physiology (id 4)
        MajorsCourse::create(['majors_id' => 2, 'courses_id' => 5]); // Pathology (id 5)

        // Architecture's Courses
        MajorsCourse::create(['majors_id' => 3, 'courses_id' => 6]); // Architectural Design (id 6)
        MajorsCourse::create(['majors_id' => 3, 'courses_id' => 7]); // History of Architecture (id 7)

        // Biology's Courses
        MajorsCourse::create(['majors_id' => 4, 'courses_id' => 8]); // Molecular Biology (id 8)
        MajorsCourse::create(['majors_id' => 4, 'courses_id' => 9]); // Ecology and Environmental Biology (id 9)
    }
}
