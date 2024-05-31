<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivityUser;

class ActivityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    ActivityUser::create(['id_activity' => 1, 'id_user' => 1]);
    ActivityUser::create(['id_activity' => 2, 'id_user' => 1]);
    ActivityUser::create(['id_activity' => 3, 'id_user' => 1]);
    ActivityUser::create(['id_activity' => 4, 'id_user' => 2]);
    ActivityUser::create(['id_activity' => 5, 'id_user' => 2]);
    ActivityUser::create(['id_activity' => 6, 'id_user' => 2]);
    ActivityUser::create(['id_activity' => 7, 'id_user' => 3]);
    ActivityUser::create(['id_activity' => 8, 'id_user' => 3]);
    ActivityUser::create(['id_activity' => 9, 'id_user' => 3]);
    ActivityUser::create(['id_activity' => 10, 'id_user' => 3]);
    }

}
