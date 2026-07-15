<?php

namespace App\Services\Recruiter;

use App\Models\Application;
use App\Models\JobPost;

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

    public function generateRecommendation(JobPost $jobPost)
    {
        $applications = Application::where(
            'job_post_id',$jobPost->id
        )->get();

        foreach($applications as $application){
            $application->update([
                'match_score'=>rand(60,95),
                'ai_feedback'=>[
                    'summary'=>'Candidate skills match the job requirements.',
                    'strengths'=>['PHP','Laravel'],
                    'missing'=>['Docker']
                ]
            ]);
        }
    }

    public function getAIData(Application $application)
    {
        $application->load([
            'jobPost.skills',
            'candidate.candidateProfile',
            'resume'
        ]);
        return [
            'application_id'=>$application->id,
            'job'=>[
                'title'=>$application->jobPost->title,
                'description'=>$application->jobPost->description,
                'skills'=>$application->jobPost->skills->pluck('name')->toArray(),
            ],
            'candidate'=>[
                'name'=>$application->candidate->name,
                'profile'=>[
                    'education'=>$application->candidate->candidateProfile->education ?? null,
                    'experience'=>$application->candidate->candidateProfile->experience_years ?? 0,
                ],
            'resume_text'=>$application->resume->extracted_text ?? null,
            ],
        ];
    }
}
