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
            'image' => 'humanities.jpg',
            'consultations' => '2024-06-01 09:00:00'
        ]); // id 1

        //Computer Science's Courses
        Course::create([
            'name' => 'Data Analysis',
            'description' => 'This course introduces techniques and tools for analyzing data. Students will learn about data collection, cleaning, visualization, and statistical analysis. They will also use software tools like Python and R to perform data analysis, gaining insights that inform decision-making processes.',
            'acronyms' => 'DA',
            'image' => 'data_analysis.jpg',
            'consultations' => '2024-06-01 16:00:00'
        ]); // id 2
        
        Course::create([
            'name' => 'Advanced Web Development',
            'description' => 'This course delves into advanced topics in web development, covering the latest technologies and frameworks used in building dynamic, responsive websites. Students will learn about server-side programming, client-side scripting, database integration, and security practices, preparing them to create robust web applications.',
            'acronyms' => 'AWD',
            'image' => 'web_development.jpg',
            'consultations' => '2024-06-01 14:00:00'
        ]); // id 3
        
        Course::create([
            'name' => 'Introduction to Programming',
            'description' => 'Designed for beginners, this course teaches the fundamentals of programming using Python. Students will learn basic programming concepts such as variables, control structures, functions, and data types, and will apply these concepts to solve problems and create simple programs.',
            'acronyms' => 'ITP',
            'image' => 'intro_programming.jpg',
            'consultations' => '2024-06-01 10:00:00'
        ]); // id 4
        
        Course::create([
            'name' => 'Computer Security',
            'description' => 'In this course, students will learn about protecting computer systems and networks from various threats. Topics include cryptography, network security, risk management, and ethical hacking. By the end of the course, students will have a solid understanding of the principles and practices of computer security.',
            'acronyms' => 'CS',
            'image' => 'computer_security.jpg',
            'consultations' => '2024-06-01 11:00:00'
        ]); // id 5

        //Medicine's Courses
        Course::create([
            'name' => 'Anatomy and Physiology',
            'description' => 'This course provides an in-depth study of the human body, focusing on the structure and function of the various organ systems. Students will explore the intricate workings of the body through lectures, lab work, and practical applications, gaining a comprehensive understanding of human physiology.',
            'acronyms' => 'AP',
            'image' => 'anatomy.jpg',
            'consultations' => '2024-06-01 09:00:00'
        ]); // id 6
        
        Course::create([
            'name' => 'Pathology',
            'description' => 'Pathology is the study of diseases, their causes, processes, development, and consequences. This course covers the fundamental concepts of pathology, including cellular injury, inflammation, and neoplasia. Students will learn to diagnose diseases through various laboratory techniques and clinical methods.',
            'acronyms' => 'PATH',
            'image' => 'pathology.jpg',
            'consultations' => '2024-06-01 10:00:00'
        ]); // id 7
        
        Course::create([
            'name' => 'Pharmacology',
            'description' => 'In this course, students will learn about the interactions between drugs and biological systems. Topics include the mechanisms of drug action, therapeutic uses, side effects, and drug interactions. Through case studies and practical sessions, students will gain a solid understanding of pharmacological principles.',
            'acronyms' => 'PHARM',
            'image' => 'pharmacology.jpg',
            'consultations' => '2024-06-01 11:00:00'
        ]); // id 8
        
        Course::create([
            'name' => 'Clinical Medicine',
            'description' => 'Clinical Medicine focuses on the application of medical knowledge to patient care. This course covers diagnostic methods, patient examination techniques, and the management of common diseases. Students will participate in clinical rotations, gaining hands-on experience in a variety of medical settings.',
            'acronyms' => 'CLIN',
            'image' => 'clinical_medicine.jpg',
            'consultations' => '2024-06-01 12:00:00'
        ]); // id 9
        
        //Architecture's Courses
        Course::create([
            'name' => 'Architectural Design',
            'description' => 'Architectural Design introduces students to the principles and practices of designing buildings and spaces. The course covers design theory, drafting techniques, and the use of software tools. Through projects and critiques, students will develop their skills in creating functional and aesthetically pleasing structures.',
            'acronyms' => 'AD',
            'image' => 'architectural_design.jpg',
            'consultations' => '2024-06-01 13:00:00'
        ]); // id 10
        
        Course::create([
            'name' => 'Building Materials and Construction',
            'description' => 'This course explores the properties and uses of various building materials and construction methods. Topics include the selection, testing, and application of materials such as wood, concrete, steel, and composites. Students will learn about sustainable building practices and the latest advancements in construction technology.',
            'acronyms' => 'BMC',
            'image' => 'building_materials.jpg',
            'consultations' => '2024-06-01 14:00:00'
        ]); // id 11
        
        Course::create([
            'name' => 'History of Architecture',
            'description' => 'History of Architecture examines the evolution of architectural styles and movements from ancient times to the present. Students will study significant buildings, architects, and cultural influences that have shaped the built environment. The course emphasizes critical analysis and the contextual understanding of architectural heritage.',
            'acronyms' => 'HA',
            'image' => 'history_of_architecture.jpg',
            'consultations' => '2024-06-01 15:00:00'
        ]); // id 12
        
        Course::create([
            'name' => 'Urban Planning',
            'description' => 'Urban Planning focuses on the development and management of urban spaces. The course covers topics such as zoning, land use, transportation systems, and environmental planning. Students will engage in planning projects and simulations, learning to create sustainable and livable urban environments.',
            'acronyms' => 'UP',
            'image' => 'urban_planning.jpg',
            'consultations' => '2024-06-01 16:00:00'
        ]); // id 13

        //Biology's Courses
        Course::create([
            'name' => 'Molecular Biology',
            'description' => 'Molecular Biology explores the molecular mechanisms of biological processes. Students will study DNA replication, transcription, translation, and gene regulation. The course includes laboratory work where students will use modern techniques to analyze genetic material and understand its function.',
            'acronyms' => 'MB',
            'image' => 'molecular_biology.jpg',
            'consultations' => '2024-06-01 09:00:00'
        ]); // id 14
        
        Course::create([
            'name' => 'Ecology and Environmental Biology',
            'description' => 'This course examines the relationships between organisms and their environments. Topics include ecosystem dynamics, population biology, conservation, and biodiversity. Students will participate in field studies and research projects to gain practical experience in ecological analysis and environmental management.',
            'acronyms' => 'EEB',
            'image' => 'ecology.jpg',
            'consultations' => '2024-06-01 10:00:00'
        ]); // id 15
        
        Course::create([
            'name' => 'Genetics',
            'description' => 'Genetics focuses on the principles of heredity and variation in living organisms. The course covers classical genetics, molecular genetics, and genomics. Students will learn about genetic mutations, inheritance patterns, and the applications of genetic research in medicine and agriculture.',
            'acronyms' => 'GEN',
            'image' => 'genetics.jpg',
            'consultations' => '2024-06-01 11:00:00'
        ]); // id 16
        
        Course::create([
            'name' => 'Microbiology',
            'description' => 'Microbiology is the study of microorganisms, including bacteria, viruses, fungi, and protozoa. The course covers microbial physiology, genetics, and pathogenesis. Students will conduct experiments in the laboratory to identify and characterize microorganisms and understand their role in health and disease.',
            'acronyms' => 'MIC',
            'image' => 'microbiology.jpg',
            'consultations' => '2024-06-01 12:00:00'
        ]); // id 17
    }
}
