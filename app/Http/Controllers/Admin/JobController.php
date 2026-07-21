<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Services\Admin\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct(private JobService $service)
    {}

    public function index()
    {
        $jobs = $this->service->getAllJobs();
        return view('admin.jobs.index',compact('jobs'));
    }

    public function show(JobPost $jobPost)
    {
        $jobPost = $this->service->getJobDetail($jobPost);
        return view('admin.jobs.show',compact('jobPost'));
    }

    public function destroy(JobPost $jobPost)
    {
        $this->service->delete($jobPost);
        return back()->with('success','Job deleted successfully.');
    }
}
