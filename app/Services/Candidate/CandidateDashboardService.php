<?php

namespace App\Services\Candidate;

use App\Models\Application;
use App\Models\JobPost;
use App\Models\Resume;

class CandidateDashboardService
{
    public function getDashboardData(int $userId)
    {
        return [
            'resumeCount'=>Resume::where(
                'user_id',
                $userId
            )->count(),

            'applicationCount'=>Application::where(
                'candidate_id',
                $userId
            )->count(),

            'recommendedJobs'=>JobPost::latest()->take(5)->get(),

            'applications'=>Application::where(
                'candidate_id',
                $userId
            )->latest()->take(5)->get(),

        ];
    }
}
