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
        Group::create(['courses_id' => 2, 'number' => 1]); // Advanced Web Development (id 2)
        Group::create(['courses_id' => 3, 'number' => 1]); // Introduction to Programming (id 3)
        Group::create(['courses_id' => 4, 'number' => 1]); // Computer Security (id 4)
        Group::create(['courses_id' => 5, 'number' => 1]); // User Interface Design (id 5)
        Group::create(['courses_id' => 6, 'number' => 1]); // Mobile Application Development (id 6)
        Group::create(['courses_id' => 7, 'number' => 1]); // Data Analysis (id 7)
        Group::create(['courses_id' => 8, 'number' => 1]); // Video Game Development (id 8)
    }
}
