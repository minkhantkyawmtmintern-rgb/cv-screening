@extends('layouts.admin')

@section('title', 'Application Details')

@section('content')

    <div class="max-w-7xl mx-auto space-y-6">

        {{-- Header --}}
        <div class="flex justify-between items-center">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">

                    Candidate AI Report

                </h1>

                <p class="text-gray-500 mt-2">

                    AI Evaluation & Candidate Information

                </p>

            </div>

            <a href="{{ route('admin.applications.index') }}" class="px-5 py-2 bg-gray-800 text-white rounded-lg">

                ← Back

            </a>

        </div>

        {{-- Candidate + Job --}}

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="font-bold text-xl mb-4">

                    👤 Candidate

                </h2>

                <div class="space-y-3">

                    <p>

                        <strong>Name:</strong>

                        {{ $application->candidate->name }}

                    </p>

                    <p>

                        <strong>Email:</strong>

                        {{ $application->candidate->email }}

                    </p>

                    <p>

                        <strong>Education:</strong>

                        {{ $application->candidate->candidateProfile->education ?? '-' }}

                    </p>

                    <p>

                        <strong>Experience:</strong>

                        {{ $application->candidate->candidateProfile->experience_years ?? 0 }}
                        years

                    </p>

                </div>

            </div>

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="font-bold text-xl mb-4">

                    💼 Applied Job

                </h2>

                <div class="space-y-3">

                    <p>

                        <strong>Title:</strong>

                        {{ $application->jobPost->title }}

                    </p>

                    <p>

                        <strong>Department:</strong>

                        {{ $application->jobPost->department }}

                    </p>

                    <p>

                        <strong>Experience:</strong>

                        {{ ucfirst($application->jobPost->experience_level) }}

                    </p>

                </div>

            </div>

        </div>

        {{-- Score --}}

        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 rounded-2xl text-white p-8">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-2xl font-bold">

                        AI Match Score

                    </h2>

                    <p class="mt-2 opacity-90">

                        Overall compatibility between candidate and job.

                    </p>

                </div>

                <div class="text-6xl font-extrabold">

                    {{ $application->match_score ?? '--' }}%

                </div>

            </div>

        </div>

        {{-- AI Report --}}

        @php

            $feedback = $application->ai_feedback ?? [];

        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- Summary --}}

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="font-bold text-xl mb-4">

                    🤖 Summary

                </h2>

                <p>

                    {{ $feedback['summary'] ?? 'No AI Summary.' }}

                </p>

            </div>

            {{-- Recommendation --}}

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="font-bold text-xl mb-4">

                    💡 Recommendation

                </h2>

                <p>

                    {{ $feedback['recommendation'] ?? 'No recommendation available.' }}

                </p>

            </div>

            {{-- Strengths --}}

            <div class="bg-green-50 rounded-2xl p-6">

                <h2 class="font-bold text-green-700 mb-4">

                    ✅ Strengths

                </h2>

                <ul class="space-y-2">

                    @forelse($feedback['strengths'] ?? [] as $item)
                        <li>✔ {{ $item }}</li>

                    @empty

                        <li>No strengths found.</li>
                    @endforelse

                </ul>

            </div>

            {{-- Weaknesses --}}

            <div class="bg-red-50 rounded-2xl p-6">

                <h2 class="font-bold text-red-700 mb-4">

                    ⚠ Weaknesses

                </h2>

                <ul class="space-y-2">

                    @forelse($feedback['weaknesses'] ?? [] as $item)
                        <li>✖ {{ $item }}</li>

                    @empty

                        <li>No weaknesses found.</li>
                    @endforelse

                </ul>

            </div>

        </div>

        {{-- Confidence --}}

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="font-bold text-xl mb-5">

                📈 AI Confidence

            </h2>

            <div class="w-full bg-gray-200 rounded-full h-4">

                <div class="bg-indigo-600 h-4 rounded-full" style="width: {{ $feedback['confidence'] ?? 0 }}%">

                </div>

            </div>

            <p class="mt-3 font-semibold">

                {{ $feedback['confidence'] ?? 0 }}%

            </p>

        </div>

        {{-- Skills --}}

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="font-bold mb-4">

                    🟢 Matched Skills

                </h2>

                @forelse($feedback['matched_skills'] ?? [] as $skill)
                    <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full mr-2 mb-2">

                        {{ $skill }}

                    </span>

                @empty

                    <p>No matched skills.</p>
                @endforelse

            </div>

            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="font-bold mb-4">

                    🔴 Missing Skills

                </h2>

                @forelse($feedback['missing_skills'] ?? [] as $skill)
                    <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full mr-2 mb-2">

                        {{ $skill }}

                    </span>

                @empty

                    <p>No missing skills.</p>
                @endforelse

            </div>

        </div>

    </div>

@endsection
