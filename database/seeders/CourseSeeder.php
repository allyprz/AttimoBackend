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

        //General Courses
        Course::create([
            'name' => 'Humanities',
            'description' => 'The study of human culture and society encompasses a wide range of disciplines including literature, philosophy, history, and art. This course explores the human experience through various cultural expressions and societal structures, providing a comprehensive understanding of the forces that shape human existence.',
            'acronyms' => 'HUM',
            'image' => 'course_1.jpg',
        ]); // id 1

        //Computer Science's Courses
        Course::create([
            'name' => 'Data Analysis',
            'description' => 'This course introduces techniques and tools for analyzing data. Students will learn about data collection, cleaning, visualization, and statistical analysis. They will also use software tools like Python and R to perform data analysis, gaining insights that inform decision-making processes.',
            'acronyms' => 'DA',
            'image' => 'course_2.jpg',
        ]); // id 2

        Course::create([
            'name' => 'Web Development',
            'description' => 'This course delves into advanced topics in web development, covering the latest technologies and frameworks used in building dynamic, responsive websites. Students will learn about server-side programming, client-side scripting, database integration, and security practices, preparing them to create robust web applications.',
            'acronyms' => 'AWD',
            'image' => 'course_3.jpg',
        ]); // id 3


        //Medicine's Courses
        Course::create([
            'name' => 'Physiology Basics',
            'description' => 'This course provides an in-depth study of the human body, focusing on the structure and function of the various organ systems. Students will explore the intricate workings of the body through lectures, lab work, and practical applications, gaining a comprehensive understanding of human physiology.',
            'acronyms' => 'AP',
            'image' => 'course_4.jpg',
        ]); // id 4

        Course::create([
            'name' => 'Pathology Basics',
            'description' => 'Pathology is the study of diseases, their causes, processes, development, and consequences. This course covers the fundamental concepts of pathology, including cellular injury, inflammation, and neoplasia. Students will learn to diagnose diseases through various laboratory techniques and clinical methods.',
            'acronyms' => 'PATH',
            'image' => 'course_5.jpg',
        ]); // id 5

        //Architecture's Courses
        Course::create([
            'name' => 'Architectural Design',
            'description' => 'Architectural Design introduces students to the principles and practices of designing buildings and spaces. The course covers design theory, drafting techniques, and the use of software tools. Through projects and critiques, students will develop their skills in creating functional and aesthetically pleasing structures.',
            'acronyms' => 'AD',
            'image' => 'course_6.jpg',
        ]); // id 6

        Course::create([
            'name' => 'History of Architecture',
            'description' => 'History of Architecture examines the evolution of architectural styles and movements from ancient times to the present. Students will study significant buildings, architects, and cultural influences that have shaped the built environment. The course emphasizes critical analysis and the contextual understanding of architectural heritage.',
            'acronyms' => 'HA',
            'image' => 'course_7.jpg',
        ]); // id 7


        //Biology's Courses
        Course::create([
            'name' => 'Molecular Biology',
            'description' => 'Molecular Biology explores the molecular mechanisms of biological processes. Students will study DNA replication, transcription, translation, and gene regulation. The course includes laboratory work where students will use modern techniques to analyze genetic material and understand its function.',
            'acronyms' => 'MB',
            'image' => 'course_8.jpg',
        ]); // id 8

        Course::create([
            'name' => 'Environmental Biology',
            'description' => 'This course examines the relationships between organisms and their environments. Topics include ecosystem dynamics, population biology, conservation, and biodiversity. Students will participate in field studies and research projects to gain practical experience in ecological analysis and environmental management.',
            'acronyms' => 'EEB',
            'image' => 'course_9.jpg',
        ]); // id 9
        Course::create([
            'name' => 'Biochemistry',
            'description' => 'Biochemistry examines the chemical processes within and related to living organisms. It is a laboratory-based science that combines biology and chemistry. Students will study biomolecules, metabolic pathways, enzymology, and molecular genetics. The course includes practical lab sessions to explore biochemical techniques and analyze molecular interactions.',
            'acronyms' => 'BC',
            'image' => 'course_10.jpg',
        ]); // id 10

    }
}
