<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobPost;
use App\Models\Skill;

class JobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $backend = JobPost::create([

            'title' => 'Backend Developer',

            'department' => 'IT',

            'description' => 
                'Develop backend APIs and maintain server applications.',

            'experience_level' => 'junior',

            'minimum_experience' => 1,

            'location' => 'Yangon',

            'is_active' => true,

        ]);

        $backend->skills()->attach([

            Skill::where('name','PHP')->first()->id => [
                'importance'=>5
            ],

            Skill::where('name','Laravel')->first()->id => [
                'importance'=>5
            ],

            Skill::where('name','MySQL')->first()->id => [
                'importance'=>4
            ],

            Skill::where('name','Git')->first()->id => [
                'importance'=>3
            ],

        ]);

        $frontend = JobPost::create([

            'title' => 'Frontend Developer',

            'department' => 'IT',

            'description' =>
                'Build modern web interfaces.',

            'experience_level'=>'junior',

            'minimum_experience'=>1,

            'location'=>'Yangon',

            'is_active'=>true,

        ]);

        $frontend->skills()->attach([

            Skill::where('name','HTML')->first()->id => [
                'importance'=>5
            ],

            Skill::where('name','CSS')->first()->id => [
                'importance'=>5
            ],

            Skill::where('name','JavaScript')->first()->id => [
                'importance'=>5
            ],

            Skill::where('name','React')->first()->id => [
                'importance'=>4
            ],

        ]);
    }
}
