<?php

namespace App\Services\Admin;

use App\Models\Application;

class ApplicationService
{
    public function getAllApplications()
    {
        return Application::with([
            'candidate',
            'jobPost',
            'resume'
        ])
        ->latest()
        ->get();
    }

    public function getApplicationDetail(Application $application)
    {
        return $application->load([
            'candidate',
            'candidate.candidateProfile',
            'jobPost.skills',
            'resume'
        ]);
    }
}