<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UsersType;

class UsersTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersType::create(['name' => 'student']);
        UsersType::create(['name' => 'professor']);
        UsersType::create(['name' => 'admin']);
    }
}
