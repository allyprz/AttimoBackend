<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UsersGroup;

class UsersGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            //Admin (John Doe)
            UsersGroup::create(['users_id' => 1, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 1, 'groups_id' => 2]);
            UsersGroup::create(['users_id' => 1, 'groups_id' => 3]);
            UsersGroup::create(['users_id' => 1, 'groups_id' => 4]);
            UsersGroup::create(['users_id' => 1, 'groups_id' => 5]);
            UsersGroup::create(['users_id' => 1, 'groups_id' => 6]);
            UsersGroup::create(['users_id' => 1, 'groups_id' => 7]);
            UsersGroup::create(['users_id' => 1, 'groups_id' => 8]);
            UsersGroup::create(['users_id' => 1, 'groups_id' => 9]);

            //student's Computer Science (Peter Williams 2)(Mary Johnson)(George Clark)
            UsersGroup::create(['users_id' => 2, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 2, 'groups_id' => 2]);
            UsersGroup::create(['users_id' => 2, 'groups_id' => 3]);

            UsersGroup::create(['users_id' => 3, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 3, 'groups_id' => 2]);
            UsersGroup::create(['users_id' => 3, 'groups_id' => 3]);

            UsersGroup::create(['users_id' => 7, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 7, 'groups_id' => 2]);
            UsersGroup::create(['users_id' => 7, 'groups_id' => 3]);

            //professor (Pamm 12)
            UsersGroup::create(['users_id' => 12, 'groups_id' => 2]);
            UsersGroup::create(['users_id' => 12, 'groups_id' => 3]);

            ////student & professor Medicine (Anna Davis 4)(Elena Roberts 8)
            UsersGroup::create(['users_id' => 4, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 4, 'groups_id' => 4]);
            UsersGroup::create(['users_id' => 4, 'groups_id' => 5]);

            UsersGroup::create(['users_id' => 8, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 8, 'groups_id' => 4]);
            UsersGroup::create(['users_id' => 8, 'groups_id' => 5]);

            //professor (Karl 11)
            UsersGroup::create(['users_id' => 11, 'groups_id' => 4]);
            UsersGroup::create(['users_id' => 11, 'groups_id' => 5]);

            ////student & professor Architecture (Laura 6)(Sophia 10)
            UsersGroup::create(['users_id' => 6, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 6, 'groups_id' => 6]);
            UsersGroup::create(['users_id' => 6, 'groups_id' => 7]);

            UsersGroup::create(['users_id' => 10, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 10, 'groups_id' => 6]);
            UsersGroup::create(['users_id' => 10, 'groups_id' => 7]);

            //professor (Peter 13)
            UsersGroup::create(['users_id' => 13, 'groups_id' => 6]);
            UsersGroup::create(['users_id' => 13, 'groups_id' => 7]);

            ////student & professor Biology (Charles 5)(Paul 9)
            UsersGroup::create(['users_id' => 5, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 5, 'groups_id' => 8]);
            UsersGroup::create(['users_id' => 5, 'groups_id' => 9]);

            UsersGroup::create(['users_id' => 9, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 9, 'groups_id' => 8]);
            UsersGroup::create(['users_id' => 9, 'groups_id' => 9]);

            UsersGroup::create(['users_id' => 15, 'groups_id' => 1]);
            UsersGroup::create(['users_id' => 15, 'groups_id' => 8]);
            UsersGroup::create(['users_id' => 15, 'groups_id' => 9]);

            //professor (Betta 14)
            UsersGroup::create(['users_id' => 14, 'groups_id' => 8]);
            UsersGroup::create(['users_id' => 14, 'groups_id' => 9]);

            //professor humanities
            UsersGroup::create(['users_id' => 12, 'groups_id' => 1]); 
        }
    }
}
