@extends('layouts.recruiter')

@section('title', 'AI Recommendations')
@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    🤖 AI Candidate Recommendations
                </h1>

                <p class="text-gray-500 mt-2">

                    Job Position :

                    <span class="font-semibold text-indigo-600">

                        {{ $jobPost->title }}

                    </span>

                </p>

            </div>

            <form method="POST" action="{{ route('recruiter.recommendations.generate', $jobPost) }}">

                @csrf

                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl shadow">

                    🤖 Generate AI Recommendation

                </button>

            </form>

        </div>

        {{-- Summary --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">

            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500 text-sm">

                    Total Candidates

                </p>

                <h2 class="text-4xl font-bold text-indigo-600 mt-2">

                    {{ $candidates->count() }}

                </h2>

            </div>

            <div class="bg-green-50 rounded-xl shadow p-5">

                <p class="text-gray-500 text-sm">

                    High Match

                </p>

                <h2 class="text-4xl font-bold text-green-600 mt-2">

                    {{ $candidates->where('match_score', '>=', 80)->count() }}

                </h2>

            </div>

            <div class="bg-yellow-50 rounded-xl shadow p-5">

                <p class="text-gray-500 text-sm">

                    Medium Match

                </p>

                <h2 class="text-4xl font-bold text-yellow-500 mt-2">

                    {{ $candidates->filter(fn($c) => $c->match_score >= 50 && $c->match_score < 80)->count() }}

                </h2>

            </div>

            <div class="bg-red-50 rounded-xl shadow p-5">

                <p class="text-gray-500 text-sm">

                    Low Match

                </p>

                <h2 class="text-4xl font-bold text-red-600 mt-2">

                    {{ $candidates->where('match_score', '<', 50)->count() }}

                </h2>

            </div>

        </div>

        {{-- Candidate List --}}
        <div class="space-y-6">

            @forelse($candidates as $application)

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    {{-- Best Candidate --}}
                    @if ($loop->first && $application->match_score)
                        <div class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg mb-4">

                            🏆 Best Candidate

                        </div>
                    @endif

                    <div class="flex flex-col lg:flex-row justify-between gap-8">

                        {{-- Left --}}
                        <div class="flex-1">

                            <h2 class="text-2xl font-bold text-gray-800">

                                {{ $application->candidate->name }}

                            </h2>

                            <p class="text-gray-500 mt-1">

                                {{ $application->jobPost->title }}

                            </p>

                            <p class="text-sm text-gray-400">

                                Rank #{{ $loop->iteration }}

                            </p>

                            <p class="text-sm text-gray-400 mt-3">

                                Resume :

                                {{ $application->resume->file_name ?? '-' }}

                            </p>

                        </div>

                        {{-- Right --}}
                        <div class="w-full lg:w-80">

                            <div class="flex justify-between mb-2">

                                <span class="font-semibold">

                                    Match Score

                                </span>

                                <span class="font-bold text-indigo-600">

                                    {{ $application->match_score ?? 0 }}%

                                </span>

                            </div>

                            <div class="w-full bg-gray-200 rounded-full h-4">

                                <div class="bg-indigo-600 h-4 rounded-full transition-all duration-500"
                                    style="width:{{ $application->match_score ?? 0 }}%">
                                </div>

                            </div>

                            <div class="mt-4">

                                @php

                                    $score = $application->match_score ?? 0;

                                @endphp

                                @if ($score >= 80)
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                        High Match

                                    </span>
                                @elseif($score >= 50)
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                        Medium Match

                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                        Low Match

                                    </span>
                                @endif

                            </div>

                        </div>

                    </div>

                    {{-- AI Feedback --}}
                    <div class="mt-8 bg-gray-50 rounded-xl p-6">

                        <h3 class="font-bold text-lg mb-4">

                            🤖 AI Analysis

                        </h3>

                        @if ($application->ai_feedback)
                            <p class="text-gray-700">

                                {{ $application->ai_feedback['summary'] ?? '' }}

                            </p>

                            {{-- Matched Skills --}}
                            @if (!empty($application->ai_feedback['matched_skills']))
                                <div class="mt-5">

                                    <h4 class="font-semibold mb-3">

                                        ✅ Matched Skills

                                    </h4>

                                    <div class="flex flex-wrap gap-2">

                                        @foreach ($application->ai_feedback['matched_skills'] as $skill)
                                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                                {{ $skill }}

                                            </span>
                                        @endforeach

                                    </div>

                                </div>
                            @endif

                            {{-- Missing Skills --}}
                            @if (!empty($application->ai_feedback['missing_skills']))
                                <div class="mt-5">

                                    <h4 class="font-semibold mb-3">

                                        ❌ Missing Skills

                                    </h4>

                                    <div class="flex flex-wrap gap-2">

                                        @foreach ($application->ai_feedback['missing_skills'] as $skill)
                                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                                {{ $skill }}

                                            </span>
                                        @endforeach

                                    </div>

                                </div>
                            @endif
                        @else
                            <p class="text-gray-400">

                                AI Recommendation has not been generated yet.

                            </p>
                        @endif

                    </div>

                    {{-- Actions --}}
                    <div class="mt-6 flex flex-wrap gap-3">

                        <a href="{{ route('recruiter.recommendations.show', $application) }}"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">

                            👤 View Profile

                        </a>

                        <a href="{{ route('recruiter.applications.resume', $application) }}"
                            class="bg-gray-800 hover:bg-gray-900 text-white px-5 py-2 rounded-lg">

                            📄 View Resume

                        </a>

                    </div>

                </div>

            @empty

                <div class="bg-white rounded-xl shadow p-12 text-center">

                    <h2 class="text-2xl font-bold text-gray-700">

                        No Candidates Found

                    </h2>

                    <p class="text-gray-400 mt-2">

                        There are currently no applications for this job post.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

@endsection
