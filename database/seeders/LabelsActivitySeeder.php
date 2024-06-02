<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LabelsActivity;

class LabelsActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LabelsActivity::create(['name' => 'Event']);
        LabelsActivity::create(['name' => 'Homework']);
        LabelsActivity::create(['name' => 'Bulletin']);
    }
}
