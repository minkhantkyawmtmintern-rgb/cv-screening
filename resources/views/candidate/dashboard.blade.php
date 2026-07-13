@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold">
                Welcome,
                {{ auth()->user()->name }}
            </h1>
            <p class="text-gray-500 mt-2">
                Manage your profile and applications
            </p>
            <div class="grid md:grid-cols-3 gap-6 mt-8">
                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="font-bold text-xl">
                        Profile
                    </h2>
                    @if (auth()->user()->candidateProfile)
                        <p class="text-green-600 mt-3">
                            Completed
                        </p>
                        <a href="{{ route('candidate.profile.show') }}" class="inline-block mt-4 text-blue-600">
                            View Profile →
                        </a>
                    @else
                        <p class="text-yellow-600 mt-3">
                            Incomplete
                        </p>
                        <a href="{{ route('candidate.profile.create') }}" class="inline-block mt-4 text-blue-600">
                            Complete Now →
                        </a>
                    @endif
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="font-bold text-xl">
                        Resume
                    </h2>
                    <p class="text-gray-500 mt-3">
                        Upload your latest CV
                    </p>
                    <a href="{{ route('candidate.resumes.index') }}" class="inline-block mt-4 text-blue-600">
                        Manage Resume →
                    </a>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">

                    <h2 class="font-bold text-xl">
                        Applications
                    </h2>
                    <p class="text-gray-500 mt-3">
                        Track your job applications
                    </p>
                    <a href="{{ route('candidate.jobs.index') }}" class="inline-block mt-4 text-blue-600">
                        View Applications →
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
