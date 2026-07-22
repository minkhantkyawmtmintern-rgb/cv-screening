<?php

namespace App\Services\Admin;

use App\Models\Skill;

class SkillService
{

    public function all(
        ?string $search = null,
        ?string $category = null,
        string $sort = 'name',
        string $direction = 'asc'
    ) {
        return Skill::withCount('jobPosts')

            ->when($search, function ($query) use ($search) {

                $query->where('name', 'ILIKE', "%{$search}%");
            })

            ->when($category, function ($query) use ($category) {

                $query->where('category', $category);
            })

            ->orderBy($sort, $direction)

            ->paginate(10)

            ->withQueryString();
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
