<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // General Courses: Humanities (id 1)
        Activity::create([
            'name' => 'Literature Review',
            'description' => 'Review and analyze a piece of literature from the Renaissance period.',
            'image' => 'literature_review.jpg',
            'percent' => 20,
            'scheduled_at' => '2024-07-01 10:00:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Philosophy Debate',
            'description' => 'Participate in a debate on philosophical ideas from the Enlightenment era.',
            'image' => 'philosophy_debate.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-10 14:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Art History Presentation',
            'description' => 'Create and present a project on the impact of the Impressionist movement in art.',
            'image' => 'art_history_presentation.jpg',
            'percent' => 25,
            'scheduled_at' => '2024-07-20 09:30:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        // Computer Science: Data Analysis (id 2)
        Activity::create([
            'name' => 'Data Cleaning Workshop',
            'description' => 'Workshop on techniques for cleaning and preprocessing data using Python.',
            'image' => 'data_cleaning_workshop.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-02 13:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Data Visualization Project',
            'description' => 'Create visualizations using a dataset and tools like Matplotlib or Tableau.',
            'image' => 'data_visualization_project.jpg',
            'percent' => 25,
            'scheduled_at' => '2024-07-12 10:30:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Statistical Analysis Assignment',
            'description' => 'Perform statistical analysis on a given dataset using R.',
            'image' => 'statistical_analysis_assignment.jpg',
            'percent' => 30,
            'scheduled_at' => '2024-07-22 11:00:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        // Computer Science: Advanced Web Development (id 3)
        Activity::create([
            'name' => 'Server-Side Programming Lab',
            'description' => 'Lab session focusing on server-side programming with Node.js.',
            'image' => 'server_side_lab.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-03 15:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Client-Side Scripting Assignment',
            'description' => 'Develop a dynamic web application using JavaScript frameworks like React.',
            'image' => 'client_side_scripting.jpg',
            'percent' => 30,
            'scheduled_at' => '2024-07-13 09:00:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Database Integration Project',
            'description' => 'Integrate a MySQL database with a web application and demonstrate CRUD operations.',
            'image' => 'database_integration.jpg',
            'percent' => 35,
            'scheduled_at' => '2024-07-23 12:30:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        // Medicine: Anatomy and Physiology (id 4)
        Activity::create([
            'name' => 'Dissection Lab',
            'description' => 'Hands-on dissection lab focusing on the musculoskeletal system.',
            'image' => 'dissection_lab.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-04 09:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Physiology Report',
            'description' => 'Write a detailed report on the cardiovascular system’s function.',
            'image' => 'physiology_report.jpg',
            'percent' => 30,
            'scheduled_at' => '2024-07-14 14:45:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Anatomy Quiz',
            'description' => 'Quiz covering the major organ systems and their functions.',
            'image' => 'anatomy_quiz.jpg',
            'percent' => 20,
            'scheduled_at' => '2024-07-24 11:15:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        // Medicine: Pathology (id 5)
        Activity::create([
            'name' => 'Disease Case Study',
            'description' => 'Conduct a case study on a specific disease, including its etiology, pathology, and clinical manifestations.',
            'image' => 'disease_case_study.jpg',
            'percent' => 25,
            'scheduled_at' => '2024-07-05 10:30:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Histopathology Lab',
            'description' => 'Lab session on histopathological techniques and examination of tissue samples.',
            'image' => 'histopathology_lab.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-15 13:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Pathology Seminar',
            'description' => 'Participate in a seminar discussing recent advancements in the field of pathology.',
            'image' => 'pathology_seminar.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-25 15:30:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        // Architecture: Architectural Design (id 6)
        Activity::create([
            'name' => 'Architectural Sketching Workshop',
            'description' => 'Workshop focusing on sketching techniques for architectural design concepts.',
            'image' => 'architectural_sketching.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-06 14:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Building Design Project',
            'description' => 'Design a sustainable building project incorporating environmental principles.',
            'image' => 'building_design_project.jpg',
            'percent' => 35,
            'scheduled_at' => '2024-07-16 09:30:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Architectural Critique',
            'description' => 'Participate in a critique session to provide feedback on peers\' design projects.',
            'image' => 'architectural_critique.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-26 11:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        // Architecture: History of Architecture (id 7)
        Activity::create([
            'name' => 'Architectural Site Visit',
            'description' => 'Visit historical architectural sites and analyze their design and cultural significance.',
            'image' => 'site_visit.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-07 10:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Architectural Theory Essay',
            'description' => 'Write an essay on a prominent architectural theory and its impact on design practice.',
            'image' => 'theory_essay.jpg',
            'percent' => 30,
            'scheduled_at' => '2024-07-17 12:00:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Architectural Timeline Project',
            'description' => 'Create a timeline highlighting key architectural movements and styles throughout history.',
            'image' => 'timeline_project.jpg',
            'percent' => 25,
            'scheduled_at' => '2024-07-27 14:00:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        // Biology: Molecular Biology (id 8)
        Activity::create([
            'name' => 'DNA Extraction Lab',
            'description' => 'Lab session demonstrating DNA extraction techniques from various biological samples.',
            'image' => 'dna_extraction_lab.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-08 11:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Gene Cloning Experiment',
            'description' => 'Conduct a gene cloning experiment to amplify and manipulate DNA sequences.',
            'image' => 'gene_cloning_experiment.jpg',
            'percent' => 35,
            'scheduled_at' => '2024-07-18 09:00:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Molecular Biology Seminar',
            'description' => 'Attend a seminar on the latest developments in molecular biology research.',
            'image' => 'molecular_biology_seminar.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-28 10:30:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        // Biology: Ecology and Environmental Biology (id 9)
        Activity::create([
            'name' => 'Field Study Excursion',
            'description' => 'Excursion to a local ecosystem for ecological observation and data collection.',
            'image' => 'field_study_excursion.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-09 08:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Environmental Impact Assessment',
            'description' => 'Conduct an assessment of the environmental impact of a proposed development project.',
            'image' => 'impact_assessment.jpg',
            'percent' => 30,
            'scheduled_at' => '2024-07-19 13:00:00',
            'labels_activities_id' => 2, // homework
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Biodiversity Conservation Workshop',
            'description' => 'Participate in a workshop focused on strategies for biodiversity conservation and management.',
            'image' => 'biodiversity_workshop.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-29 15:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 1, // course
            'status_activities_id' => 1, // active
        ]);

        // University-level Activities
        Activity::create([
            'name' => 'Welcome Ceremony',
            'description' => 'Participate in the annual university welcome ceremony for new students.',
            'image' => 'welcome_ceremony.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-08-01 10:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 2, // university
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Student Council Election',
            'description' => 'Cast your vote in the student council election to choose representatives for the academic year.',
            'image' => 'student_council_election.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-08-10 09:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 2, // university
            'status_activities_id' => 1, // active
        ]);

        // Student-level Activities
        Activity::create([
            'name' => 'Study Group Session',
            'description' => 'Attend a study group session to review course materials and prepare for upcoming exams.',
            'image' => 'study_group_session.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-05 15:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 3, // student
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Career Fair',
            'description' => 'Explore career opportunities and network with professionals at the university\'s career fair event.',
            'image' => 'career_fair.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-20 11:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 3, // student
            'status_activities_id' => 1, // active
        ]);

        // Major-level Activities
        Activity::create([
            'name' => 'Industry Guest Lecture',
            'description' => 'Attend a guest lecture by industry experts discussing current trends and innovations in the field.',
            'image' => 'guest_lecture.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-12 13:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 4, // major
            'status_activities_id' => 1, // active
        ]);

        Activity::create([
            'name' => 'Major Networking Event',
            'description' => 'Participate in a networking event with alumni and professionals in the major to build connections and gain insights into career paths.',
            'image' => 'networking_event.jpg',
            'percent' => 0,
            'scheduled_at' => '2024-07-25 14:00:00',
            'labels_activities_id' => 1, // event
            'categories_activities_id' => 4, // major
            'status_activities_id' => 1, // active
        ]);
    }
}