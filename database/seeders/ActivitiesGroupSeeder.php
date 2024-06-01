<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivitiesGroup;

class ActivitiesGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asociar actividades de Humanities al grupo 1
        ActivitiesGroup::create(['activities_id' => 1, 'groups_id' => 1]);
        ActivitiesGroup::create(['activities_id' => 2, 'groups_id' => 1]);
        ActivitiesGroup::create(['activities_id' => 3, 'groups_id' => 1]);

        // Asociar actividades de Data Analysis al grupo 1
        ActivitiesGroup::create(['activities_id' => 4, 'groups_id' => 2]);
        ActivitiesGroup::create(['activities_id' => 5, 'groups_id' => 2]);
        ActivitiesGroup::create(['activities_id' => 6, 'groups_id' => 2]);

        // Asociar actividades de Advanced Web Development al grupo 1
        ActivitiesGroup::create(['activities_id' => 7, 'groups_id' => 3]);
        ActivitiesGroup::create(['activities_id' => 8, 'groups_id' => 3]);
        ActivitiesGroup::create(['activities_id' => 9, 'groups_id' => 3]);

        // Asociar actividades de Anatomy and Physiology al grupo 1
        ActivitiesGroup::create(['activities_id' => 10, 'groups_id' => 4]);
        ActivitiesGroup::create(['activities_id' => 11, 'groups_id' => 4]);
        ActivitiesGroup::create(['activities_id' => 12, 'groups_id' => 4]);

        // Asociar actividades de Pathology al grupo 1
        ActivitiesGroup::create(['activities_id' => 13, 'groups_id' => 5]);
        ActivitiesGroup::create(['activities_id' => 14, 'groups_id' => 5]);
        ActivitiesGroup::create(['activities_id' => 15, 'groups_id' => 5]);

        // Asociar actividades de Architectural Design al grupo 1
        ActivitiesGroup::create(['activities_id' => 16, 'groups_id' => 6]);
        ActivitiesGroup::create(['activities_id' => 17, 'groups_id' => 6]);
        ActivitiesGroup::create(['activities_id' => 18, 'groups_id' => 6]);

        // Asociar actividades de History of Architecture al grupo 1
        ActivitiesGroup::create(['activities_id' => 19, 'groups_id' => 7]);
        ActivitiesGroup::create(['activities_id' => 20, 'groups_id' => 7]);
        ActivitiesGroup::create(['activities_id' => 21, 'groups_id' => 7]);

        // Asociar actividades de Molecular Biology al grupo 1
        ActivitiesGroup::create(['activities_id' => 22, 'groups_id' => 8]);
        ActivitiesGroup::create(['activities_id' => 23, 'groups_id' => 8]);
        ActivitiesGroup::create(['activities_id' => 24, 'groups_id' => 8]);

        // Asociar actividades de Ecology and Environmental Biology al grupo 1
        ActivitiesGroup::create(['activities_id' => 25, 'groups_id' => 9]);
        ActivitiesGroup::create(['activities_id' => 26, 'groups_id' => 9]);
        ActivitiesGroup::create(['activities_id' => 27, 'groups_id' => 9]);
    }
}
