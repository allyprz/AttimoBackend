<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivitiesMajor;

class ActivitiesMajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Activies for Computer Science (id = 1)
        ActivitiesMajor::create(['activities_id' => 32, 'majors_id' => 1]);
        ActivitiesMajor::create(['activities_id' => 33, 'majors_id' => 1]);
    }
}
