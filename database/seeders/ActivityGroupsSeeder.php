<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ActivityGroup;

class ActivityGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
DB::table('activities_groups')->insert([ 
 ['id_activity' => 1, 'id_group' => 1],
 ['id_activity' => 2, 'id_group' => 1], 
 ['id_activity' => 3, 'id_group' => 1],
 ['id_activity' => 4, 'id_group' => 1],
 ['id_activity' => 5, 'id_group' => 1], 
 ['id_activity' => 6, 'id_group' => 2],
 ['id_activity' => 7, 'id_group' => 2],
 ['id_activity' => 8, 'id_group' => 2],
 ['id_activity' => 9, 'id_group' => 2],
 ['id_activity' => 10, 'id_group' => 2],
 ['id_activity' => 11, 'id_group' => 3],
 ['id_activity' => 12, 'id_group' => 3],
 ['id_activity' => 13, 'id_group' => 3],
 ['id_activity' => 14, 'id_group' => 3],
 ['id_activity' => 15, 'id_group' => 3],
 ['id_activity' => 16, 'id_group' => 4],
 ['id_activity' => 17, 'id_group' => 4],
 ['id_activity' => 18, 'id_group' => 4],
 ['id_activity' => 19, 'id_group' => 4],
 ['id_activity' => 20, 'id_group' => 4],
 ['id_activity' => 21, 'id_group' => 5], 
 ['id_activity' => 22, 'id_group' => 5],
 ['id_activity' => 23, 'id_group' => 5],
 ['id_activity' => 24, 'id_group' => 5],
 ['id_activity' => 25, 'id_group' => 5],
 ['id_activity' => 26, 'id_group' => 6],
 ['id_activity' => 27, 'id_group' => 6],
 ['id_activity' => 28, 'id_group' => 6],
 ['id_activity' => 29, 'id_group' => 6],
 ['id_activity' => 30, 'id_group' => 6],
 ['id_activity' => 31, 'id_group' => 7],
 ['id_activity' => 32, 'id_group' => 7],
 ['id_activity' => 33, 'id_group' => 7],
 ['id_activity' => 34, 'id_group' => 7],
 ['id_activity' => 35, 'id_group' => 7],
 ['id_activity' => 36, 'id_group' => 8],
 ['id_activity' => 37, 'id_group' => 8],
 ['id_activity' => 38, 'id_group' => 8],
 ['id_activity' => 39, 'id_group' => 8],
 ['id_activity' => 40, 'id_group' => 8], ]);
    }

}
