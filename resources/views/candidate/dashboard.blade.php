@extends('layouts.candidate')


@section('title', 'Dashboard')

@section('content')

    <h1 class="text-3xl font-bold mb-6">

        Welcome back, {{ auth()->user()->name }} 👋

    </h1>

    <div class="grid grid-cols-3 gap-6 mb-8">

        <div class="bg-white rounded-xl p-6 shadow">

            <h3 class="text-gray-500">
                Resume
            </h3>

            <p class="text-3xl font-bold">

                {{ $resumeCount }}

            </p>

        </div>

        <div class="bg-white rounded-xl p-6 shadow">

            <h3 class="text-gray-500">
                Applications
            </h3>

            <p class="text-3xl font-bold">

                {{ $applicationCount }}

            </p>

        </div>

        <div class="bg-white rounded-xl p-6 shadow">

            <h3 class="text-gray-500">
                Profile
            </h3>

            <p class="text-3xl font-bold">

                {{ auth()->user()->candidateProfile ? 'Complete' : 'Incomplete' }}

            </p>

        </div>

    </div>

    <div class="bg-white rounded-xl p-6 shadow mb-8">

        <h2 class="text-xl font-bold mb-5">

            Recommended Jobs

        </h2>

        @foreach ($recommendedJobs as $job)
            <div class="border-b py-4">

                <h3 class="font-bold">

                    {{ $job->title }}

                </h3>

                <p class="text-gray-600">

                    {{ $job->location }}

                </p>

                <a href="{{ route('candidate.jobs.show', $job) }}" class="text-blue-600">

                    View Details

                </a>

            </div>
        @endforeach

    </div>

    <div class="bg-white rounded-xl p-6 shadow">

        <h2 class="text-xl font-bold mb-5">

            Recent Applications

        </h2>

        @if ($applications->count())

            @foreach ($applications as $application)
                <div class="border-b py-3">

                    {{ $application->jobPost->title }}

                    <span class="ml-3 text-gray-500">

                        {{ $application->status ?? 'Submitted' }}

                    </span>

                </div>
            @endforeach
        @else
            <p>
                No applications yet.
            </p>

        @endif

    </div>

@endsection
