<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplyJobRequest;
use App\Services\ApplicationService;
use App\Models\JobPost;


class ApplicationController extends Controller
{
    public function __construct(private ApplicationService $service)
    { }

    public function index()
    {
        $applications = $this->service
            ->getCandidateApplications(
                auth()->id()
            );
        return view('candidate.applications.index',compact('applications'));
    }

    public function create(JobPost $jobPost)
    {
       $resumes = $this->service
        ->getCandidateResumes(
            auth()->id()
        );

        return view('candidate.applications.create',compact('jobPost','resumes'));
    }

    public function store(ApplyJobRequest $request,JobPost $jobPost)
    {
        $this->service->apply(
            $jobPost,
            auth()->id(),
            $request->validated()
            );
        return redirect()
            ->route('candidate.jobs.index')
            ->with('success','Application submitted successfully.');
    }
}
