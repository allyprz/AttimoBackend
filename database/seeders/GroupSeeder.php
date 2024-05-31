<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    Group::create(['id_course' => 1,'number' => 1]);
    Group::create(['id_course' => 2,'number' => 1]);
    Group::create(['id_course' => 3,'number' => 1]);
    Group::create(['id_course' => 4,'number' => 1]);
    Group::create(['id_course' => 5,'number' => 2]);
    Group::create(['id_course' => 6,'number' => 2]);
    Group::create(['id_course' => 7,'number' => 2]);
    Group::create(['id_course' => 8,'number' => 3]);
    }
}