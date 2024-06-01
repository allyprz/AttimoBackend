<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivitiesUser;

class ActivitiesUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Associate administrator to their actividades 
        //ActivitiesUser::create(['activities_id' => 28, 'users_id' => 1]); // University level activities - Welcome Ceremony

        //Professors

        // Associate Professor Pamm to their activities in Computer Science 
        ActivitiesUser::create(['activities_id' => 28, 'users_id' => 12]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29, 'users_id' => 12]); // University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 32, 'users_id' => 12]); // Major level activities - Industry Guest Lecture
        ActivitiesUser::create(['activities_id' => 33, 'users_id' => 12]); // Major level activities - Major Networking Event

        // Associate Professor Karl to their activities in Medicine
        ActivitiesUser::create(['activities_id' => 28, 'users_id' => 11]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29, 'users_id' => 11]); // University level activities - Student Council Elections
        
        // Associate Professor Pete to their activities in Arquitecture
        ActivitiesUser::create(['activities_id' => 28, 'users_id' => 13]); // University level activities- Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29, 'users_id' => 13]); // University level activities - Student Council Elections

        // Associate Professor Betta to their activities in Arquitecture
        ActivitiesUser::create(['activities_id' => 28, 'users_id' => 14]); // University level activities- Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29, 'users_id' => 14]); // University level activities - Student Council Elections

        
        /*
        Students:
        All students are associated with the following activities:
        - Humanities activities
        - University level activities 
        - Student level activities
        */

        // Associate student Peter to their activities in Computer Science 
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 2]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 2]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 2]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 4, 'users_id' => 2]); // Data Analysis - Data Cleaning Workshop 
        ActivitiesUser::create(['activities_id' => 5, 'users_id' => 2]); // Data Analysis - Data Visualization Project
        ActivitiesUser::create(['activities_id' => 6, 'users_id' => 2]); // Data Analysis - Statistical Analysis Assignment
        ActivitiesUser::create(['activities_id' => 7, 'users_id' => 2]); // Advanced Web Development - Server-Side Programming Lab
        ActivitiesUser::create(['activities_id' => 8, 'users_id' => 2]); // Advanced Web Development - Client-Side Scripting Assignment
        ActivitiesUser::create(['activities_id' => 9, 'users_id' => 2]); // Advanced Web Development - Database Integration Project
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 2]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 2]); // University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 2]); // Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 2]); // Student level activities - Career Fair
        ActivitiesUser::create(['activities_id' => 32,'users_id' => 2]); // Major level activities - Industry Guest Lecture
        ActivitiesUser::create(['activities_id' => 33,'users_id' => 2]); // Major level activities - Major Networking Event


        // Associate student Mary to their activities in Computer Science 
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 3]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 3]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 3]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 4, 'users_id' => 3]); // Data Analysis - Data Cleaning Workshop 
        ActivitiesUser::create(['activities_id' => 5, 'users_id' => 3]); // Data Analysis - Data Visualization Project
        ActivitiesUser::create(['activities_id' => 6, 'users_id' => 3]); // Data Analysis - Statistical Analysis Assignment
        ActivitiesUser::create(['activities_id' => 7, 'users_id' => 3]); // Advanced Web Development - Server-Side Programming Lab
        ActivitiesUser::create(['activities_id' => 8, 'users_id' => 3]); // Advanced Web Development - Client-Side Scripting Assignment
        ActivitiesUser::create(['activities_id' => 9, 'users_id' => 3]); // Advanced Web Development - Database Integration Project
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 3]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 3]); // University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 3]); // Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 3]); // Student level activities - Career Fair
        ActivitiesUser::create(['activities_id' => 32,'users_id' => 3]); // Major level activities - Industry Guest Lecture
        ActivitiesUser::create(['activities_id' => 33,'users_id' => 3]); // Major level activities - Major Networking Event

        // Associate student George to their activities in Computer Science 
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 7]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 7]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 7]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 4, 'users_id' => 7]); // Data Analysis - Data Cleaning Workshop
        ActivitiesUser::create(['activities_id' => 5, 'users_id' => 7]); // Data Analysis - Data Visualization Project
        ActivitiesUser::create(['activities_id' => 6, 'users_id' => 7]); // Data Analysis - Statistical Analysis Assignment
        ActivitiesUser::create(['activities_id' => 7, 'users_id' => 7]); // Advanced Web Development - Server-Side Programming Lab 
        ActivitiesUser::create(['activities_id' => 8, 'users_id' => 7]); // Advanced Web Development - CLient-Side Scripting Assignment
        ActivitiesUser::create(['activities_id' => 9, 'users_id' => 7]); // Advanced Web Development - Database Integration Project
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 7]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 7]); // University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 7]); // Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 7]); // Student level activities - Career Fair
        ActivitiesUser::create(['activities_id' => 32,'users_id' => 7]); // Major level activities - Industry Guest Lecture
        ActivitiesUser::create(['activities_id' => 33,'users_id' => 7]); // Major level activities - Major Networking Event

        // Associate student Anna to their activities in Medicine
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 4]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 4]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 4]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 10, 'users_id' => 4]); //Anatomy and Physiology - Dissection Lab
        ActivitiesUser::create(['activities_id' => 11, 'users_id' => 4]); //Anatomy and Physiology - Physiology Report
        ActivitiesUser::create(['activities_id' => 12, 'users_id' => 4]); //Anatomy and Physiology - Anatomy Quiz
        ActivitiesUser::create(['activities_id' => 13, 'users_id' => 4]); //Pathology - Disease Case Study
        ActivitiesUser::create(['activities_id' => 14, 'users_id' => 4]); //Pathology - Histopathology Lab
        ActivitiesUser::create(['activities_id' => 15, 'users_id' => 4]); //Pathology - Pathology Seminar
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 4]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 4]); // University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 4]); // Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 4]); // Student level activities - Career Fair

        // Associate student Elena to their activities in Medicine
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 8]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 8]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 8]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 10, 'users_id' => 8]); //Anatomy and Physiology - Dissection Lab
        ActivitiesUser::create(['activities_id' => 11, 'users_id' => 8]); //Anatomy and Physiology - Physiology Report
        ActivitiesUser::create(['activities_id' => 12, 'users_id' => 8]); //Anatomy and Physiology - Anatomy Quiz
        ActivitiesUser::create(['activities_id' => 13, 'users_id' => 8]); //Pathology - Disease Case Study
        ActivitiesUser::create(['activities_id' => 14, 'users_id' => 8]); //Pathology - Histopathology Lab
        ActivitiesUser::create(['activities_id' => 15, 'users_id' => 8]); //Pathology - Pathology Seminar
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 8]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 8]); // University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 8]); // Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 8]); // Student level activities - Career Fair

    
        // Associate student Laura to their activities in Arquitecture
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 6]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 6]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 6]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 16, 'users_id' => 6]); //Architectural Design - Architectural Sketching Workshop
        ActivitiesUser::create(['activities_id' => 17, 'users_id' => 6]); //Architectural Design - Building Design Project
        ActivitiesUser::create(['activities_id' => 18, 'users_id' => 6]); //Architectural Design - Architectural Critique
        ActivitiesUser::create(['activities_id' => 19, 'users_id' => 6]); //History of Architecture - Architectural Site Visit
        ActivitiesUser::create(['activities_id' => 20, 'users_id' => 6]); //History of Architecture - Architectural Theory Essay
        ActivitiesUser::create(['activities_id' => 21, 'users_id' => 6]); //History of Architecture - Architectural Timeline Project
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 6]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 6]); // University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 6]); // Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 6]); // Student level activities - Career Fair

        // Associate student Sophia to their activities in Arquitecture
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 10]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 10]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 10]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 16, 'users_id' => 10]); //Architectural Design - Architectural Sketching Workshop
        ActivitiesUser::create(['activities_id' => 17, 'users_id' => 10]); //Architectural Design - Building Design Project
        ActivitiesUser::create(['activities_id' => 18, 'users_id' => 10]); //Architectural Design - Architectural Critique
        ActivitiesUser::create(['activities_id' => 19, 'users_id' => 10]); //History of Architecture - Architectural Site Visit
        ActivitiesUser::create(['activities_id' => 20, 'users_id' => 10]); //History of Architecture - Architectural Theory Essay
        ActivitiesUser::create(['activities_id' => 21, 'users_id' => 10]); //History of Architecture - Architectural Timeline Project
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 10]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 10]); // University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 10]); // Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 10]); // Student level activities - Career Fair

        // Associate student Paul to their activities in Biology
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 9]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 9]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 9]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 22, 'users_id' => 9]); //Molecular Biology - DNA Extraction Lab
        ActivitiesUser::create(['activities_id' => 23, 'users_id' => 9]); //Molecular Biology - Genetic Clone experiment
        ActivitiesUser::create(['activities_id' => 24, 'users_id' => 9]); //Molecular Biology - Molecular Biology Seminar
        ActivitiesUser::create(['activities_id' => 25, 'users_id' => 9]); //Ecology and Environmental Biology - Field Study Excursion
        ActivitiesUser::create(['activities_id' => 26, 'users_id' => 9]); //Ecology and Environmental Biology - Environmental Impact Assessment
        ActivitiesUser::create(['activities_id' => 27, 'users_id' => 9]); //Ecology and Environmental Biology - Biodiversity Conservation Workshop
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 9]); // University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 9]); // University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 9]); // Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 9]); // Student level activities - Career Fair

        // Associate student Charles to their activities in Biology
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 5]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 5]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 5]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 22, 'users_id' => 5]); //Molecular Biology - DNA Extraction Lab
        ActivitiesUser::create(['activities_id' => 23, 'users_id' => 5]); //Molecular Biology - Genetic Clone experiment
        ActivitiesUser::create(['activities_id' => 24, 'users_id' => 5]); //Molecular Biology - Molecular Biology Seminar
        ActivitiesUser::create(['activities_id' => 25, 'users_id' => 5]); //Ecology and Environmental Biology - Field Study Excursion
        ActivitiesUser::create(['activities_id' => 26, 'users_id' => 5]); //Ecology and Environmental Biology - Environmental Impact Assessment
        ActivitiesUser::create(['activities_id' => 27, 'users_id' => 5]); //Ecology and Environmental Biology - Biodiversity Conservation Workshop
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 5]); //University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 5]); //University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 5]); //Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 5]); //Student level activities - Career Fair

        // Associate student Lewis to their activities in Biology
        ActivitiesUser::create(['activities_id' => 1, 'users_id' => 15]); // Humanities -Literature Review
        ActivitiesUser::create(['activities_id' => 2, 'users_id' => 15]); // Humanities -Philosophy Debate
        ActivitiesUser::create(['activities_id' => 3, 'users_id' => 15]); // Humanities - Art History Presentation
        ActivitiesUser::create(['activities_id' => 22, 'users_id' => 15]); //Molecular Biology - DNA Extraction Lab
        ActivitiesUser::create(['activities_id' => 23, 'users_id' => 15]); //Molecular Biology - Genetic Clone experiment
        ActivitiesUser::create(['activities_id' => 24, 'users_id' => 15]); //Molecular Biology - Molecular Biology Seminar
        ActivitiesUser::create(['activities_id' => 25, 'users_id' => 15]); //Ecology and Environmental Biology - Field Study Excursion
        ActivitiesUser::create(['activities_id' => 26, 'users_id' => 15]); //Ecology and Environmental Biology - Environmental Impact Assessment
        ActivitiesUser::create(['activities_id' => 27, 'users_id' => 15]); //Ecology and Environmental Biology - Biodiversity Conservation Workshop
        ActivitiesUser::create(['activities_id' => 28,'users_id' => 15]); //University level activities - Welcome Ceremony
        ActivitiesUser::create(['activities_id' => 29,'users_id' => 15]); //University level activities - Student Council Elections
        ActivitiesUser::create(['activities_id' => 30,'users_id' => 15]); //Student level activities - Study Group Session
        ActivitiesUser::create(['activities_id' => 31,'users_id' => 15]); //Student level activities - Career Fair

    }
}
