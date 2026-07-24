<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobPost;
use App\Services\Recruiter\RecommendationService;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function __construct(private RecommendationService $service)
    { }

    public function index(Request $request,JobPost $jobPost)
    {
        $candidates = $this->service->getRecommendedCandidates($jobPost->id, $request);
        return view(
            'recruiter.recommendations.index',
            compact('jobPost','candidates')
        );
    }

    public function generate(JobPost $jobPost)
    {
        $this->service->generateRecommendation($jobPost);
        return redirect()
            ->route('recruiter.recommendations.index',$jobPost)
            ->with('success','AI Recommendation Generated.');
    }

    public function show(Application $application)
    {
        $application->load([
            'candidate.candidateProfile',
            'resume',
            'jobPost.skills'
        ]);
        return view('recruiter.recommendations.show',compact('application'));
    }
}
