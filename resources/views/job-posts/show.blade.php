@extends('layouts.recruiter')
@section('title', 'Job Intelligence')
@section('content')

    <div class="max-w-6xl mx-auto">
        <div class="bg-white rounded-2xl shadow p-8">
            <div class="flex flex-col md:flex-row justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $jobPost->title }}
                    </h1>
                    <p class="text-gray-500 mt-2">
                        {{ $jobPost->department }}
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('job-posts.edit', $jobPost) }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl">
                        Edit Profile
                    </a>

                    @if ($jobPost->is_active)
                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
                            Active
                        </span>
                    @else
                        <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full">
                            Inactive
                        </span>
                    @endif

                </div>
            </div>
            <hr class="my-8">
            <h2 class="text-xl font-bold mb-4">
                Job Description
            </h2>
            <p class="text-gray-600 leading-relaxed">
                {{ $jobPost->description }}
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-8">
                <div class="bg-gray-50 p-5 rounded-xl">
                    <p class="text-gray-500">
                        Experience Level
                    </p>
                    <h3 class="font-bold text-lg">
                        {{ ucfirst($jobPost->experience_level) }}
                    </h3>
                </div>

                <div class="bg-gray-50 p-5 rounded-xl">
                    <p class="text-gray-500">
                        Minimum Experience
                    </p>
                    <h3 class="font-bold text-lg">
                        {{ $jobPost->minimum_experience ?? 0 }}
                        Years
                    </h3>
                </div>

                <div class="bg-gray-50 p-5 rounded-xl">
                    <p class="text-gray-500">
                        Location
                    </p>
                    <h3 class="font-bold text-lg">
                        {{ $jobPost->location }}
                    </h3>
                </div>
            </div>

            <div class="mt-10">
                <h2 class="text-xl font-bold mb-5">
                    AI Requirement Profile
                </h2>
                <div class="space-y-4">
                    @foreach ($jobPost->skills as $skill)
                        <div>
                            <div class="flex justify-between mb-2">
                                <span class="font-medium">
                                    {{ $skill->name }}
                                </span>
                                <span class="text-blue-600">
                                    {{ $skill->pivot->importance }}/5
                                </span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-3">
                                <div class="bg-blue-600 h-3 rounded-full"
                                    style="width: {{ $skill->pivot->importance * 20 }}%">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
