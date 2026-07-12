<?php

namespace App\Http\Controllers\Candidate;

use App\Models\Resume;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResumeRequest;
use App\Services\ResumeService;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function __construct(private ResumeService $service){}

    public function index()
    {
        $resumes = $this->service->getUserResumes(auth()->id());
        return view('candidate.resumes.index',compact('resumes'));
    }
    
    public function create()
    {
        return view('candidate.resumes.create');
    }

    public function store(StoreResumeRequest $request)
    {
        $this->service->upload(
            $request->file('resume'),
            auth()->id()
        );
        return redirect()
                ->route('candidate.resumes.index')
                ->with('success','Resume uploaded successfully.');
    }

    public function destroy(Resume $resume)
    {
        $this->service->delete($resume);
        return back()->with('success','Resume deleted.');
    }
}
