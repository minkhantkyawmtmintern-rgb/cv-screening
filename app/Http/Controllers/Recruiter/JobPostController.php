<?php

namespace App\Http\Controllers\Recruiter;

use App\Models\JobPost;
use App\Models\Skill;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobPostRequest;
use App\Services\JobPostService;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    public function __construct(private JobPostService $service) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = $this->service->getRecruiterJobs();

        return view(
            'job-posts.index',
            compact('jobs')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $skills = Skill::all();

        return view(
            'job-posts.create',
            compact('skills')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobPostRequest $request)
    {
        $this->service->create(
            $request->validated()
        );

        return redirect()
            ->route('job-posts.index')
            ->with(
                'success',
                'Job created successfully.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
        $data = $this->service->getJobDetail($jobPost);

        return view('job-posts.show', $data );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $jobPost)
    {
        $skills = Skill::all();

        return view(
            'job-posts.edit',
            compact(
                'jobPost',
                'skills'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobPostRequest $request, JobPost $jobPost)
    {
        $this->service->update(
            $jobPost,
            $request->validated()
        );

        return redirect()
            ->route('job-posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $jobPost)
    {
        $this->service->delete($jobPost);

        return back();
    }
}
