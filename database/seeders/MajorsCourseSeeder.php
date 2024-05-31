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
        MajorsCourse::create(['majors_id' => 1, 'courses_id' => 4]); // Introduction to Programming (id 4)
        MajorsCourse::create(['majors_id' => 1, 'courses_id' => 5]); // Computer Security (id 5)

        // Medicine's Courses
        MajorsCourse::create(['majors_id' => 2, 'courses_id' => 6]); // Anatomy and Physiology (id 6)
        MajorsCourse::create(['majors_id' => 2, 'courses_id' => 7]); // Pathology (id 7)
        MajorsCourse::create(['majors_id' => 2, 'courses_id' => 8]); // Pharmacology (id 8)
        MajorsCourse::create(['majors_id' => 2, 'courses_id' => 9]); // Clinical Medicine (id 9)

        // Architecture's Courses
        MajorsCourse::create(['majors_id' => 3, 'courses_id' => 10]); // Architectural Design (id 10)
        MajorsCourse::create(['majors_id' => 3, 'courses_id' => 11]); // Building Materials and Construction (id 11)
        MajorsCourse::create(['majors_id' => 3, 'courses_id' => 12]); // History of Architecture (id 12)
        MajorsCourse::create(['majors_id' => 3, 'courses_id' => 13]); // Urban Planning (id 13)

        // Biology's Courses
        MajorsCourse::create(['majors_id' => 4, 'courses_id' => 14]); // Molecular Biology (id 14)
        MajorsCourse::create(['majors_id' => 4, 'courses_id' => 15]); // Ecology and Environmental Biology (id 15)
        MajorsCourse::create(['majors_id' => 4, 'courses_id' => 16]); // Genetics (id 16)
        MajorsCourse::create(['majors_id' => 4, 'courses_id' => 17]); // Microbiology (id 17)
    }
}
