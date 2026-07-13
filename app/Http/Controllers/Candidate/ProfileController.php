<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Http\Requests\CandidateProfileRequest;
use App\Services\CandidateProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct(private CandidateProfileService $service)
    { }

    public function show()
    {
        $profile = Auth::user()->candidateProfile;
        return view('candidate.profile.show',compact('profile'));
    }

    public function create()
    {
        $profile = Auth::user()->candidateProfile;
        if($profile)
        {
            return redirect()->route('candidate.profile.edit');
        }
        return view('candidate.profile.create');
    }

    public function store(CandidateProfileRequest $request)
    {
        $this->service->create(
            Auth::user(),$request->validated()
        );
        return redirect()->route('candidate.profile.show')
                         ->with('success','Profiel created successfully.');
    }

    public function edit()
    {
        $profile = Auth::user()->candidateProfile;
        return view('candidate.profile.edit',compact('profile'));
    }

    public function update(CandidateProfileRequest $request)
    {
        $profile = Auth::user()->candidateProfile;
        $this->service->update($profile,$request->validated());
        return redirect()->route('candidate.profile.show')
                         ->with('success','Profile updated successfully.');
    }
}
