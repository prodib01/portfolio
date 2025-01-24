<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create([
            'name' => 'Programming',
            'proficiency' => 'Expert'
        ]);
        User::all()->each(function ($user) {
            Skill::factory()->count(5)->create(['user_id' => $user->id]);
        });
    }
}
