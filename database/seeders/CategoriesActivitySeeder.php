<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriesActivity;

class CategoriesActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriesActivity::create(['name' => 'course']);
        CategoriesActivity::create(['name' => 'university']);
        CategoriesActivity::create(['name' => 'student']);
        CategoriesActivity::create(['name' => 'major']);
    }
}
