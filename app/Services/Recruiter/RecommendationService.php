<?php

namespace App\Services\Recruiter;

use App\Models\Application;

class RecommendationService
{
    public function getRecommendedCandidates($jobPostId)
    {
        return Application::with([
            'candidate.candidateProfile','resume'
        ])->where('job_post_id',$jobPostId)
          ->orderByDesc('match_score')
          ->get();
    }
}
