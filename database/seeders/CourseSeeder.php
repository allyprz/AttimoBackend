<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'Humanities I',
            'description' => 'It delves into the ways in which humans have expressed themselves, interacted, and shaped societies throughout history.',
            'acronyms' => 'TM-1100',
            'image' => 'https://i.ibb.co/qkTRmJT/humanities.png',
            'consultations' => 'Tuesday 10:00:00'
        ]);
        
        Course::create([
            'name' => 'Advanced Web Development',
            'description' => 'This course explores advanced web development techniques, including frontend and backend frameworks, RESTful APIs, and relational databases.',
            'acronyms' => 'TM-4200',
            'image' => 'https://i.ibb.co/BZy6qPg/Advanced-Web.png',
            'consultations' => 'Monday-Friday 14:00:00'
        ]);
        
        Course::create([
            'name' => 'Introduction to programming',
            'description' => 'An introduction to programming provides newcomers with the foundational knowledge and skills necessary to understand and create computer programs.',
            'acronyms' => 'TM-4300',
            'image' => 'https://i.ibb.co/kSbQfsC/intro-progra.png',
            'consultations' => 'Friday 13:30:00'
        ]);
        
        Course::create([
            'name' => 'Computer Security',
            'description' => 'This course covers the fundamental principles of computer security, including cryptography, protection against cyber attacks, and network security.',
            'acronyms' => 'TM-3400',
            'image' => 'https://i.ibb.co/3SpCPYR/informatic-security.png',
            'consultations' => 'Wednesday 11:00:00'
        ]);
        
        Course::create([
            'name' => 'User Interface Design',
            'description' => 'This course focuses on the principles of effective user interface design, including usability, accessibility, and user-centered design.',
            'acronyms' => 'TM-3200',
            'image' => 'https://i.ibb.co/J5CfCfw/UI.png',
            'consultations' => 'Wednesday 15:30:00'
        ]);
        
        Course::create([
            'name' => 'Mobile Application Development',
            'description' => 'This course explores the development of mobile applications for iOS and Android platforms, including native development and cross-platform frameworks.',
            'acronyms' => 'TM-6500',
            'image' => 'https://i.ibb.co/nMNjsNC/mobil-dev.png',
            'consultations' => 'Monday 08:00:00'
        ]);
        
        Course::create([
            'name' => 'Data Analysis',
            'description' => 'This course addresses data analysis techniques, including data exploration, visualization, and statistical analysis tools.',
            'acronyms' => 'TM-2300',
            'image' => 'https://i.ibb.co/Jc7hWYQ/data-analysis.png',
            'consultations' => 'Thursday 14:00:00'
        ]);
        
        Course::create([
            'name' => 'Video Game Development',
            'description' => 'This course focuses on video game development, covering aspects such as game design, graphics, sound and gameplay programming.',
            'acronyms' => 'TM-7100',
            'image' => 'https://i.ibb.co/nbfJTtK/game-dev.png',
            'consultations' => 'Thursday 09:00:00'
        ]);
    }

}
