<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\MajorsUser;

class MajorsUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MajorsUser::create(['user_id' => 1, 'major_id' => 1]);
        MajorsUser::create(['user_id' => 1, 'major_id' => 2]);
        MajorsUser::create(['user_id' => 2, 'major_id' => 1]);
        MajorsUser::create(['user_id' => 3, 'major_id' => 3]);
        MajorsUser::create(['user_id' => 4, 'major_id' => 1]);
        MajorsUser::create(['user_id' => 4, 'major_id' => 3]);
        MajorsUser::create(['user_id' => 5, 'major_id' => 2]);
        MajorsUser::create(['user_id' => 5, 'major_id' => 3]);
        
    }
}
