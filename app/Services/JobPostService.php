<?php

namespace App\Services;

use App\Models\JobPost;
use Illuminate\Support\Facades\DB;

class JobPostService
{
    public function getRecruiterJobs()
    {
        return JobPost::with('skills')

            ->withCount('applications')

            ->withCount('highMatchedApplications')

            ->withAvg('applications', 'match_score')

            ->latest()

            ->paginate(10);
    }

    public function create(array $data): JobPost
    {
        return DB::transaction(function () use ($data) {
            $jobPost = JobPost::create([
                'title' => $data['title'],
                'department' => $data['department'] ?? null,
                'description' => $data['description'] ?? null,
                'experience_level' => $data['experience_level'],
                'minimum_experience' => $data['minimum_experience'] ?? null,
                'location' => $data['location'] ?? null,
                'is_active' => true,
                'created_by' => auth()->id(),
            ]);
            if (isset($data['skills'])) {
                $skills = [];
                foreach ($data['skills'] as $skillId => $skill) {
                    if (isset($skill['selected'])) {
                        $skills[$skillId] = [
                            'importance' =>
                            $skill['importance'] ?? 3
                        ];
                    }
                }
                $jobPost->skills()->attach($skills);
            }
            return $jobPost;
        });
    }

    public function update(
        JobPost $jobPost,
        array $data
    ) {
        return DB::transaction(function () use ($jobPost, $data) {
            $jobPost->update([
                'title' => $data['title'],
                'department' => $data['department'] ?? null,
                'description' => $data['description'] ?? null,
                'experience_level' => $data['experience_level'],
                'minimum_experience' => $data['minimum_experience'] ?? null,
                'location' => $data['location'] ?? null,
            ]);
            if (isset($data['skills'])) {
                $skills = [];
                foreach ($data['skills'] as $skillId => $skill) {
                    if (isset($skill['selected'])) {
                        $skills[$skillId] = [
                            'importance' =>
                            $skill['importance'] ?? 3
                        ];
                    }
                }
                $jobPost->skills()->sync($skills);
            }
            return $jobPost;
        });
    }

    public function delete(JobPost $jobPost)
    {
        return $jobPost->delete();
    }
}
