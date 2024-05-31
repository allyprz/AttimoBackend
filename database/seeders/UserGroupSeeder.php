<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserGroup;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    UserGroup::create(['id_user' => 1, 'id_group' => 1]);
    UserGroup::create(['id_user' => 1, 'id_group' => 1]);
    UserGroup::create(['id_user' => 1, 'id_group' => 2]);
    UserGroup::create(['id_user' => 1, 'id_group' => 2]);
    UserGroup::create(['id_user' => 2, 'id_group' => 1]);
    UserGroup::create(['id_user' => 2, 'id_group' => 1]);
    UserGroup::create(['id_user' => 2, 'id_group' => 3]);
    UserGroup::create(['id_user' => 3, 'id_group' => 1]);
    UserGroup::create(['id_user' => 3, 'id_group' => 2]);
    UserGroup::create(['id_user' => 3, 'id_group' => 1]);
    }

}
