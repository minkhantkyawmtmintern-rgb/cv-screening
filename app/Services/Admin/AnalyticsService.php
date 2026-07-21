<?php

namespace App\Services\Admin;

use App\Models\Application;
use App\Models\JobPost;
use App\Models\User;

class AnalyticsService
{

    public function getOverview()
    {
        return [

            'total_users' =>
            User::count(),


            'total_jobs' =>
            JobPost::count(),


            'total_applications' =>
            Application::count(),


            'ai_processed' =>
            Application::whereNotNull(
                'match_score'
            )->count(),


            'average_score' =>
            round(
                Application::whereNotNull('match_score')
                    ->avg('match_score') ?? 0,
                2
            ),

        ];
    }



    public function getTopCandidates()
    {
        return Application::with([
            'candidate',
            'jobPost'
        ])

            ->whereNotNull('match_score')

            ->orderByDesc(
                'match_score'
            )

            ->limit(5)

            ->get();
    }



    public function getSkillStatistics()
    {
        $applications = Application::whereNotNull(
            'ai_feedback'
        )->get();


        $missingSkills = [];


        foreach ($applications as $application) {

            $skills =
                $application
                    ->ai_feedback['missing_skills']
                ?? [];


            foreach ($skills as $skill) {
                $missingSkills[] = $skill;
            }
        }


        return collect($missingSkills)
            ->countBy()
            ->sortDesc()
            ->take(5);
    }
}
