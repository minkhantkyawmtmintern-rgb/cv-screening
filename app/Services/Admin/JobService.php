<?php

namespace App\Services\Admin;

use App\Models\JobPost;
class JobService
{
    public function getAllJobs()
    {
        return JobPost::with([
            'creator',
            'skills'
        ])
            ->latest()
            ->get();
    }

    public function getJobDetail(JobPost $jobPost)
    {

        return $jobPost->load([
            'creator',
            'skills',
            'applications'
        ]);
    }

    public function delete(JobPost $jobPost)
    {

        return $jobPost->delete();
    }
}
