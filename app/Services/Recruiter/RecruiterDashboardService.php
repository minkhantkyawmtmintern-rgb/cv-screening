<?php

namespace App\Services\Recruiter;

use App\Models\JobPost;
use App\Models\Application;
use App\Models\User;

class RecruiterDashboardService
{
   
    public function getDashboardData()
    {
        return [
            'totalJobs'=>JobPost::count(),
            'totalApplications'=>Application::count(),
            'totalCandidates'=>User::where(
                'role','candidate'
            )->count(),
            'recentApplications'=>Application::with([
                'candidate','jobPost','resume'
            ])->latest()->take(5)->get(),
        ];
    }
}
