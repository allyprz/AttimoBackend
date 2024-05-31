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
            'name' => 'Humanities',
            'description' => 'The study of human culture and society encompasses a wide range of disciplines including literature, philosophy, history, and art. This course explores the human experience through various cultural expressions and societal structures, providing a comprehensive understanding of the forces that shape human existence.',
            'acronyms' => 'HUM',
            'image' => 'humanities.jpg',
            'consultations' => '2024-06-01 09:00:00'
        ]); // id 1
        
        Course::create([
            'name' => 'Advanced Web Development',
            'description' => 'This course delves into advanced topics in web development, covering the latest technologies and frameworks used in building dynamic, responsive websites. Students will learn about server-side programming, client-side scripting, database integration, and security practices, preparing them to create robust web applications.',
            'acronyms' => 'AWD',
            'image' => 'web_development.jpg',
            'consultations' => '2024-06-01 14:00:00'
        ]); // id 2
        
        Course::create([
            'name' => 'Introduction to Programming',
            'description' => 'Designed for beginners, this course teaches the fundamentals of programming using Python. Students will learn basic programming concepts such as variables, control structures, functions, and data types, and will apply these concepts to solve problems and create simple programs.',
            'acronyms' => 'ITP',
            'image' => 'intro_programming.jpg',
            'consultations' => '2024-06-01 10:00:00'
        ]); // id 3
        
        Course::create([
            'name' => 'Computer Security',
            'description' => 'In this course, students will learn about protecting computer systems and networks from various threats. Topics include cryptography, network security, risk management, and ethical hacking. By the end of the course, students will have a solid understanding of the principles and practices of computer security.',
            'acronyms' => 'CS',
            'image' => 'computer_security.jpg',
            'consultations' => '2024-06-01 11:00:00'
        ]); // id 4
        
        Course::create([
            'name' => 'User Interface Design',
            'description' => 'This course focuses on designing user interfaces for applications. Students will learn about user experience (UX) principles, usability testing, and design tools. They will also gain practical experience in creating intuitive and aesthetically pleasing interfaces that enhance the user experience.',
            'acronyms' => 'UID',
            'image' => 'ui_design.jpg',
            'consultations' => '2024-06-01 13:00:00'
        ]); // id 5
        
        Course::create([
            'name' => 'Mobile Application Development',
            'description' => 'Students in this course will learn how to develop applications for mobile devices, including smartphones and tablets. The curriculum covers mobile operating systems, application architecture, and development tools. By the end of the course, students will be able to design, develop, and deploy mobile applications.',
            'acronyms' => 'MAD',
            'image' => 'mobile_app.jpg',
            'consultations' => '2024-06-01 15:00:00'
        ]); // id 6
        
        Course::create([
            'name' => 'Data Analysis',
            'description' => 'This course introduces techniques and tools for analyzing data. Students will learn about data collection, cleaning, visualization, and statistical analysis. They will also use software tools like Python and R to perform data analysis, gaining insights that inform decision-making processes.',
            'acronyms' => 'DA',
            'image' => 'data_analysis.jpg',
            'consultations' => '2024-06-01 16:00:00'
        ]); // id 7
        
        Course::create([
            'name' => 'Video Game Development',
            'description' => 'This course covers the fundamentals of creating and designing video games. Topics include game design principles, programming, graphics, sound, and user interaction. Students will work on projects that allow them to apply these principles and develop their own video games from concept to completion.',
            'acronyms' => 'VGD',
            'image' => 'game_development.jpg',
            'consultations' => '2024-06-01 17:00:00'
        ]); // id 8
    }
}
