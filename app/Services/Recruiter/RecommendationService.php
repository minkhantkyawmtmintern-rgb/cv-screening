<?php

namespace App\Services\Recruiter;

use App\Models\Application;
use App\Models\JobPost;
use App\Services\AI\AIService;
class RecommendationService
{
    public function __construct(private AIService $ai)
    {
        //
    }

    public function getRecommendedCandidates(int $jobPostId)
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
           $data = $this->getAIData($application);

           $result = $this->ai->analyze($data);

           $application->update([
            'match_score'=>$result['score'],
            'ai_feedback'=>$result['feedback'],
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
