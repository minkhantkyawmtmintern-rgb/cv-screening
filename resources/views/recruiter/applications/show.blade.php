@extends('layouts.recruiter')
    
@section('title', 'Candidate Detail')
@section('content')

    <div class="space-y-6">

        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold">
                    Candidate Profile
                </h1>

                <p class="text-gray-500">
                    Review candidate application
                </p>
            </div>
            <a href="{{ route('recruiter.applications.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg">
                Back
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-xl font-bold mb-5">
                Personal Information
            </h2>

            <div class="grid md:grid-cols-2 gap-5">

                <div>
                    <p class="text-gray-500">
                        Name
                    </p>

                    <p class="font-semibold">
                        {{ $application->candidate->name }}
                    </p>

                </div>

                <div>
                    <p class="text-gray-500">
                        Email
                    </p>

                    <p class="font-semibold">
                        {{ $application->candidate->email }}
                    </p>
                </div>
            </div>
        </div>

        @if ($application->candidate->candidateProfile)
            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-xl font-bold mb-5">
                    Professional Information
                </h2>

                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <p class="text-gray-500">
                            Education
                        </p>

                        <p>
                            {{ $application->candidate->candidateProfile->education }}
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">
                            Experience
                        </p>

                        <p>
                            {{ $application->candidate->candidateProfile->experience_years }}
                            Years
                        </p>
                    </div>

                </div>
                <div class="mt-5">
                    <p class="text-gray-500">
                        Summary
                    </p>

                    <p>
                        {{ $application->candidate->candidateProfile->summary }}
                    </p>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-xl font-bold mb-5">
                Resume
            </h2>

            <p class="mb-4">
                {{ $application->resume->file_name }}
            </p>

            <a href="{{ route('recruiter.applications.resume',$application) }}" target="_blank"
                class="px-5 py-2 bg-slate-900 text-white rounded-lg">
                View Resume
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold mb-5">
                Application
            </h2>

            <p class="text-gray-500">
                Applied Job
            </p>

            <p class="font-semibold mb-4">
                {{ $application->jobPost->title }}
            </p>

            <p class="text-gray-500">
                Cover Letter
            </p>

            <p>
                {{ $application->cover_letter ?? 'No cover letter' }}
            </p>

        </div>


        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white rounded-2xl p-6">

            <h2 class="text-xl font-bold">
                🤖 AI Recommendation
            </h2>

            <p class="mt-3">
                AI analysis will appear here after resume processing.
            </p>

            <div class="mt-4 text-3xl font-bold">
                -- %
            </div>

        </div>
    </div>

@endsection
