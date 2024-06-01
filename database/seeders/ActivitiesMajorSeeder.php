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
        //
        ActivitiesMajor::create(['activities_id' => 4, 'majors_id' => 1]);
        ActivitiesMajor::create(['activities_id' => 5, 'majors_id' => 1]);
        ActivitiesMajor::create(['activities_id' => 6, 'majors_id' => 1]);
        ActivitiesMajor::create(['activities_id' => 7, 'majors_id' => 1]);
        ActivitiesMajor::create(['activities_id' => 8, 'majors_id' => 1]);
        ActivitiesMajor::create(['activities_id' => 9, 'majors_id' => 1]);

    }
}
