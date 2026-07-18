@extends('layouts.recruiter')

@section('title','AI Candidate Report')

@section('content')

<div class="max-w-7xl mx-auto">

    <div class="mb-8">

        <a
            href="{{ route('recruiter.recommendations.index',$application->jobPost) }}"
            class="text-indigo-600">

            ← Back

        </a>

    </div>

    <div class="grid lg:grid-cols-3 gap-6">

        {{-- Left --}}

        <div class="lg:col-span-2">

            <div class="bg-white rounded-xl shadow p-6">

                <h1 class="text-3xl font-bold">

                    {{ $application->candidate->name }}

                </h1>

                <p class="text-gray-500">

                    {{ $application->jobPost->title }}

                </p>

                <hr class="my-5">

                <h2 class="font-bold text-lg">

                    🤖 AI Summary

                </h2>

                <p class="mt-3">

                    {{ $application->ai_feedback['summary'] ?? '-' }}

                </p>

            </div>

            <div class="bg-white rounded-xl shadow p-6 mt-6">

                <h2 class="font-bold text-lg mb-4">

                    ✅ Matched Skills

                </h2>

                <div class="flex flex-wrap gap-2">

                    @foreach($application->ai_feedback['matched_skills'] ?? [] as $skill)

                        <span
                            class="bg-green-100 text-green-700 px-3 py-2 rounded-full">

                            {{ $skill }}

                        </span>

                    @endforeach

                </div>

            </div>

            <div class="bg-white rounded-xl shadow p-6 mt-6">

                <h2 class="font-bold text-lg mb-4">

                    ❌ Missing Skills

                </h2>

                <div class="flex flex-wrap gap-2">

                    @foreach($application->ai_feedback['missing_skills'] ?? [] as $skill)

                        <span
                            class="bg-red-100 text-red-700 px-3 py-2 rounded-full">

                            {{ $skill }}

                        </span>

                    @endforeach

                </div>

            </div>

        </div>

        {{-- Right --}}

        <div>

            <div class="bg-white rounded-xl shadow p-6">

                <h2 class="font-bold">

                    Match Score

                </h2>

                <div class="mt-4">

                    <div
                        class="w-40 h-40 rounded-full bg-indigo-100 flex items-center justify-center mx-auto">

                        <span class="text-5xl font-bold text-indigo-700">

                            {{ $application->match_score }}%

                        </span>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-xl shadow p-6 mt-6">

                <h2 class="font-bold mb-4">

                    Candidate

                </h2>

                <p>

                    <strong>Name :</strong>

                    {{ $application->candidate->name }}

                </p>

                <p class="mt-2">

                    <strong>Education :</strong>

                    {{ $application->candidate->candidateProfile->education ?? '-' }}

                </p>

                <p class="mt-2">

                    <strong>Experience :</strong>

                    {{ $application->candidate->candidateProfile->experience_years ?? 0 }}

                    years

                </p>

            </div>

            <div class="bg-white rounded-xl shadow p-6 mt-6">

                <a
                    href="{{ route('recruiter.applications.resume',$application) }}"
                    class="block bg-indigo-600 text-center text-white py-3 rounded-xl">

                    📄 View Resume

                </a>

            </div>

        </div>

    </div>

</div>

@endsection