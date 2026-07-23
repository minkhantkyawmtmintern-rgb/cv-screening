@extends('layouts.recruiter')

@section('title', 'Job Posts')
@section('content')

    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">
            Job Intelligence Center
        </h2>
        <a href="{{ route('job-posts.create') }}" class="bg-blue-600 text-white px-5 py-3 rounded-xl">
            + Create Job
        </a>
    </div>

    <div class="grid grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex justify-between">
                    <h3 class="text-xl font-bold">
                        {{ $job->title }}
                    </h3>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Active
                    </span>
                </div>
                <div class="flex justify-between mt-4 mb-3">
                    <p class="text-gray-500 mt-3">
                        {{ $job->department }}
                    </p>
                    @if ($job->applications_count > 0)
                        <span
                            class="inline-flex items-center rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-700">
                            🤖 AI Ready
                        </span>
                    @else
                        <span
                            class="inline-flex items-center rounded-full bg-gray-100 px-2 py-1 text-xs font-medium text-gray-600">
                            Waiting for Applicants
                        </span>
                    @endif
                </div>
                <div class="grid grid-cols-3 gap-3 mb-5">
                    <div class="bg-gray-50 rounded-lg p-3 text-center">
                        <h4 class="text-blue-600 font-bold text-2xl">
                            {{ $job->applications_count }}
                        </h4>
                        <small class="text-gray-500">
                            Applicants
                        </small>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3 text-center">
                        @if ($job->applications_count)
                            <h4 class="text-green-600 font-bold text-2xl">
                                {{ number_format($job->applications_avg_match_score, 1) }}%
                            </h4>
                        @else
                            <h4 class="text-gray-400 font-bold text-2xl">
                                --
                            </h4>
                        @endif
                        <small class="text-gray-500">
                            Avg Match
                        </small>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-3 text-center">
                        <h4 class="text-purple-600 font-bold text-2xl">
                            {{ $job->high_matched_applications_count }}
                        </h4>
                        <small class="text-gray-500">
                            High Match
                        </small>
                    </div>
                </div>
                <div class="mt-5">
                    <h4 class="font-semibold">
                        Required Skills
                    </h4>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach ($job->skills as $skill)
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                {{ $skill->name }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div class="mt-6 flex justify-between">
                    <div class="flex gap-16">
                        <a href="{{ route('job-posts.show', $job) }}" class="text-blue-600 hover:underline">
                            View Intelligence
                        </a>
                        <a href="{{ route('job-posts.edit', $job) }}" class="text-gray-600 hover:underline">
                            Edit
                        </a>
                    </div>
                    <form method="POST" action="{{ route('job-posts.destroy', $job) }}"
                        onsubmit="return confirm('Delete this job profile?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
