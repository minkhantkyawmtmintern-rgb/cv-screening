<?php

namespace App\Services\Admin;

use App\Models\Skill;

class SkillService
{

    public function all()
    {
       return Skill::withCount('jobPosts')
        ->orderBy('category')
        ->orderBy('name')
        ->get();
    }

    public function store(array $data)
    {
        return Skill::create($data);
    }

    public function update(Skill $skill, array $data)
    {
        $skill->update($data);

        return $skill;
    }

    public function delete(Skill $skill)
    {
        if ($skill->jobPosts()->exists()) {
            throw new \Exception(
                'This skill is already assigned to one or more job posts.'
            );
        }

        $skill->delete();
    }
}
