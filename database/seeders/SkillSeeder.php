<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [

            [
                'name' => 'PHP',
                'category' => 'Backend'
            ],

            [
                'name' => 'Laravel',
                'category' => 'Backend'
            ],

            [
                'name' => 'Node.js',
                'category' => 'Backend'
            ],

            [
                'name' => 'Python',
                'category' => 'Backend'
            ],

            [
                'name' => 'Java',
                'category' => 'Backend'
            ],

            [
                'name' => 'HTML',
                'category' => 'Frontend'
            ],

            [
                'name' => 'CSS',
                'category' => 'Frontend'
            ],

            [
                'name' => 'JavaScript',
                'category' => 'Frontend'
            ],

            [
                'name' => 'React',
                'category' => 'Frontend'
            ],

            [
                'name' => 'Vue',
                'category' => 'Frontend'
            ],


            [
                'name' => 'MySQL',
                'category' => 'Database'
            ],

            [
                'name' => 'PostgreSQL',
                'category' => 'Database'
            ],


            [
                'name' => 'Docker',
                'category' => 'DevOps'
            ],

            [
                'name' => 'Git',
                'category' => 'DevOps'
            ],

            [
                'name' => 'AWS',
                'category' => 'Cloud'
            ],

            [
                'name' => 'Machine Learning',
                'category' => 'AI'
            ],

            [
                'name' => 'NLP',
                'category' => 'AI'
            ],

        ];

        foreach ($skills as $skill) {

            Skill::create($skill);
        }
    }
}
