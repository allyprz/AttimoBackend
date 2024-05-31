<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuestionsAnswer;

class QuestionsAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Respuestas de John
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 2]); // John, Gender: Female
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 1]); // John, Scholarship: No scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 5]); // John, Sleep Hours: +9hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 2]); // John, Sports: No

        // Respuestas de Mary
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 1]); // Mary, Gender: Male
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 3]); // Mary, Scholarship: Partial scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 3]); // Mary, Sleep Hours: 7-8hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 1]); // Mary, Sports: Yes

        // Respuestas de Peter
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 2]); // Peter, Gender: Female
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 2]); // Peter, Scholarship: Full scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 2]); // Peter, Sleep Hours: 4-6hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 2]); // Peter, Sports: No

        // Respuestas de Anna
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 2]); // Anna, Gender: Female
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 1]); // Anna, Scholarship: No scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 3]); // Anna, Sleep Hours: 7-8hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 2]); // Anna, Sports: No

        // Respuestas de Charles
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 2]); // Charles, Gender: Female
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 1]); // Charles, Scholarship: No scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 3]); // Charles, Sleep Hours: 7-8hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 2]); // Charles, Sports: No

        // Respuestas de Laura
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 1]); // Laura, Gender: Male
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 2]); // Laura, Scholarship: Full scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 2]); // Laura, Sleep Hours: 4-6hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 2]); // Laura, Sports: No

        // Respuestas de George
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 1]); // George, Gender: Male
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 3]); // George, Scholarship: Partial scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 3]); // George, Sleep Hours: 7-8hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 2]); // George, Sports: No

        // Respuestas de Elena
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 2]); // Elena, Gender: Female
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 2]); // Elena, Scholarship: Full scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 4]); // Elena, Sleep Hours: 7-8hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 2]); // Elena, Sports: No

        // Respuestas de Paul
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 1]); // Paul, Gender: Male
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 2]); // Paul, Scholarship: Full scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 2]); // Paul, Sleep Hours: 4-6hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 2]); // Paul, Sports: No

        // Respuestas de Sophia
        QuestionsAnswer::create(['questions_id' => 1, 'answers_id' => 1]); // Sophia, Gender: Male
        QuestionsAnswer::create(['questions_id' => 2, 'answers_id' => 1]); // Sophia, Scholarship: No scholarship
        QuestionsAnswer::create(['questions_id' => 3, 'answers_id' => 4]); // Sophia, Sleep Hours: 7-8hrs
        QuestionsAnswer::create(['questions_id' => 4, 'answers_id' => 2]); // Sophia, Sports: No

    }
}
