<?php

namespace App\Services\Recruiter;

use App\Models\Application;
use App\Models\JobPost;
use App\Services\AI\AIService;
use Illuminate\Http\Request;

class RecommendationService
{
    public function __construct(private AIService $ai)
    {
        //
    }

    public function getRecommendedCandidates(int $jobPostId, Request $request)
    {
        $query = Application::with([
            'candidate.candidateProfile',
            'resume'
        ])->where('job_post_id', $jobPostId);

        if ($request->filled('search')) {
            $query->whereHas('candidate', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }
        switch ($request->filter) {
            case 'high':
                $query->where('match_score', '>=', 80);
                break;

            case 'medium':
                $query->whereBetween('match_score', [60, 79]);
                break;

            case 'low':
                $query->where('match_score', '<', 60);
                break;
        }
        switch ($request->sort) {
            case 'lowest':
                $query->orderBy('match_score', 'asc');
                break;

            case 'latest':
                $query->latest(); // Default orders by created_at desc
                break;

            default:
                $query->orderByDesc('match_score');
                break;
        }
        return $query->paginate(10)->withQueryString();
    }

    public function generateRecommendation(JobPost $jobPost)
    {
        $applications = Application::where(
            'job_post_id',
            $jobPost->id
        )->get();

        foreach ($applications as $application) {
            $data = $this->getAIData($application);

            $result = $this->ai->analyze($data);

            $application->update([
                'match_score' => $result['score'],
                'ai_feedback' => $result['feedback'],
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
            'application_id' => $application->id,
            'job' => [
                'title' => $application->jobPost->title,
                'description' => $application->jobPost->description ?? '',
                'required_skills' => $application->jobPost->skills->pluck('name')->toArray(),
            ],
            'candidate' => [
                'name' => $application->candidate->name,
                'profile' => [
                    'education' => $application->candidate->candidateProfile->education ?? null,
                    'experience' => $application->candidate->candidateProfile->experience_years ?? 0,
                ],
                'resume_text' => $application->resume->extracted_text ?? '',
                'skills' => []
            ],
        ];
    }
}
