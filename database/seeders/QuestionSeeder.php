<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create(['question' => 'What is your Gender?']);
        Question::create(['question' => 'Select your scholarship level']);
        Question::create(['question' => 'How many hours do you sleep?']);
        Question::create(['question' => 'Are you active in sports?']);
    }
}
