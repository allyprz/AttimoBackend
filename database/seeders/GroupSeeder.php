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
        Group::create(['courses_id' => 1, 'users_id' => 12, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // Humanities - Professor Pamm (Computer Science)

        // Computer Science's Courses
        Group::create(['courses_id' => 2, 'users_id' => 12, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // Data Analysis - Professor Pamm
        Group::create(['courses_id' => 3, 'users_id' => 12, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // Advanced Web Development - Professor Pamm

        // Medicine's Courses
        Group::create(['courses_id' => 4, 'users_id' => 11, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // Anatomy and Physiology - Professor Karl
        Group::create(['courses_id' => 5, 'users_id' => 11, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // Pathology - Professor Karl

        // Architecture's Courses
        Group::create(['courses_id' => 6, 'users_id' => 13, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // Architectural Design - Professor Peter
        Group::create(['courses_id' => 7, 'users_id' => 13, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // History of Architecture - Professor Peter

        // Biology's Courses
        Group::create(['courses_id' => 8, 'users_id' => 14, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // Molecular Biology
        Group::create(['courses_id' => 9, 'users_id' => 14, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // Ecology and Environmental Biology
        //Biochemistry
        Group::create(['courses_id' => 10, 'users_id' => 14, 'number' => 1, 'consultations' => 'Monday 13:00 - 15:00']); // Biochemistry
    }
}