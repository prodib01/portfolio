<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Portfolio',
            'description' => 'Responsive portfolio built with Laravel',
            'technologies' => 'Laravel, PHP, MySQL',
            'user_id' => User::factory(),
        ]);

    }
}
