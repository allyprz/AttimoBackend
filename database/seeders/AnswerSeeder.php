<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Answer::create(['questions_id' => 1, 'answer' => 'Male']);
        Answer::create(['questions_id' => 1, 'answer' => 'Female']);
        Answer::create(['questions_id' => 1, 'answer' => 'Other']);

        Answer::create(['questions_id' => 2, 'answer' => 'No scholarship']);
        Answer::create(['questions_id' => 2, 'answer' => 'Full scholarship']);
        Answer::create(['questions_id' => 2, 'answer' => 'Partial scholarship']);

        Answer::create(['questions_id' => 3, 'answer' => '-4hrs']);
        Answer::create(['questions_id' => 3, 'answer' => '4-6hrs']);
        Answer::create(['questions_id' => 3, 'answer' => '7-8hrs']);
        Answer::create(['questions_id' => 3, 'answer' => '7-8hrs']);
        Answer::create(['questions_id' => 3, 'answer' => '+9hrs']);

        Answer::create(['questions_id' => 4, 'answer' => 'Y']);
        Answer::create(['questions_id' => 4, 'answer' => 'N']);
    }
}
