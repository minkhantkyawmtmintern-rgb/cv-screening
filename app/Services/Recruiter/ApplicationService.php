<?php

namespace App\Services\Recruiter;

use App\Models\Application;

class ApplicationService
{
   
   public function getApplications()
   {
    return Application::with([
        'jobPost',
        'candidate',
        'resume'
    ])->latest()->get();
   }

   public function getApplication(Application $application)
   {
    return $application->load([
        'jobPost',
        'candidate.candidateProfile',
        'resume'
    ]);
   }
}
