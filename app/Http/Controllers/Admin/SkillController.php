<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SkillRequest;
use App\Services\Admin\SkillService;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function __construct(private SkillService $service) {}

    public function index(Request $request)
    {
        $skills = $this->service->all(
            $request->search,
            $request->category,
            $request->get('sort', 'name'),
            $request->get('direction', 'asc')
        );

        return view(
            'admin.skills.index',
            compact('skills')
        );
    }
    
    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(SkillRequest $request)
    {
        $this->service->store($request->validated());
        return redirect()->route('admin.skills.index')->with('success', 'Skill created successfully.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(SkillRequest $request, Skill $skill)
    {
        $this->service->update($skill, $request->validated());
        return redirect()->route('admin.skills.index')->with('success', 'Skill updated.');
    }

    public function destroy(Skill $skill)
    {
        try {

            $this->service->delete($skill);

            return back()->with(
                'success',
                'Skill deleted successfully.'
            );
        } catch (\Exception $e) {

            return back()->with(
                'error',
                $e->getMessage()
            );
        }
    }
}
