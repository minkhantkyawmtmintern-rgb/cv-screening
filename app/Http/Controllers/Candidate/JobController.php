<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobPost::with('skills')
                ->where('is_active',true)
                ->latest()
                ->get();
        return view('candidate.jobs.index',compact('jobs'));
    }

    public function show(JobPost $jobPost)
    {
        $jobPost->load('skills');
        return view('candidate.jobs.show',compact('jobPost'));
    }
}
