<?php

namespace App\Services;

use App\Models\Application;
use App\Models\JobPost;
use App\Models\Resume;
use Illuminate\Support\Facades\DB;

class ApplicationService
{
    public function getCandidateResumes(int $userId)
    {
        return Resume::where('user_id',$userId)
            ->latest()
            ->get();
    }

    public function apply(
        JobPost $jobPost,
        int $userId,
        array $data
    ) {

        return DB::transaction(function () use (
            $jobPost,
            $userId,
            $data
        ) {

            return Application::create([

                'job_post_id' => $jobPost->id,

                'candidate_id' => $userId,

                'resume_id' => $data['resume_id'],

                'cover_letter' => $data['cover_letter'] ?? null,

                'match_score' => null,

                'ai_feedback' => null,

            ]);
        });
    }

    public function getCandidateApplications(int $userId)
    {
        return Application::with([
            'jobPost',
            'resume'
        ])
            ->where(
                'candidate_id',
                $userId
            )
            ->latest()
            ->get();
    }
}
