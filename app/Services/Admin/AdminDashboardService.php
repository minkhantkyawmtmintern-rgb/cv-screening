<?php

namespace App\Services\Admin;

use App\Models\Application;
use App\Models\JobPost;
use App\Models\User;

class AdminDashboardService
{
    public function getStatistics(): array
    {
        return [

            'candidates' => User::where('role', 'candidate')->count(),

            'recruiters' => User::where('role', 'recruiter')->count(),

            'jobs' => JobPost::count(),

            'applications' => Application::count(),

            'ai_reports' => Application::whereNotNull('match_score')->count(),

            'average_score' => round(
                Application::whereNotNull('match_score')
                    ->avg('match_score') ?? 0,
                2
            ),

        ];
    }
}