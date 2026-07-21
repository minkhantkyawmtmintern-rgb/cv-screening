@extends('layouts.admin')

@section('title', 'Job Details')

@section('content')

    <div class="max-w-5xl mx-auto">

        <div class="mb-6 flex justify-between items-center">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">
                    {{ $jobPost->title }}
                </h1>

                <p class="text-gray-500 mt-2">
                    Job Details & Monitoring
                </p>

            </div>

            <a href="{{ route('admin.jobs.index') }}" class="px-4 py-2 bg-gray-700 text-white rounded-lg">

                Back

            </a>

        </div>

        <div class="bg-white shadow rounded-xl p-6 space-y-6">

            <div>

                <h2 class="font-semibold text-gray-700">
                    Created By
                </h2>

                <p class="text-gray-600">
                    {{ $jobPost->creator?->name ?? 'Deleted User' }}
                </p>

                <p class="text-sm text-gray-400">
                    {{ $jobPost->creator?->email }}
                </p>

            </div>

            <div>

                <h2 class="font-semibold text-gray-700">
                    Department
                </h2>

                <p>
                    {{ $jobPost->department ?? '-' }}
                </p>

            </div>

            <div>

                <h2 class="font-semibold text-gray-700">
                    Description
                </h2>

                <p class="text-gray-600 whitespace-pre-line">
                    {{ $jobPost->description }}
                </p>

            </div>

            <div>

                <h2 class="font-semibold text-gray-700">
                    Experience
                </h2>

                <p>
                    {{ ucfirst($jobPost->experience_level) }}

                    @if ($jobPost->minimum_experience)
                        ({{ $jobPost->minimum_experience }} years)
                    @endif

                </p>

            </div>

            <div>

                <h2 class="font-semibold text-gray-700 mb-2">
                    Required Skills
                </h2>

                @foreach ($jobPost->skills as $skill)
                    <span
                        class="inline-block px-3 py-1 mr-2 mb-2 
                    bg-indigo-100 text-indigo-600 rounded-full">

                        {{ $skill->name }}

                    </span>
                @endforeach

            </div>

            <div>

                <h2 class="font-semibold text-gray-700">
                    Total Applications
                </h2>

                <p class="text-2xl font-bold text-indigo-600">

                    {{ $jobPost->applications->count() }}

                </p>

            </div>

            <div class="pt-5 border-t">

                <form method="POST" action="{{ route('admin.jobs.destroy', $jobPost) }}">

                    @csrf

                    @method('DELETE')

                    <button onclick="return confirm('Are you sure you want to delete this job?')"
                        class="px-5 py-3 bg-red-600 text-white rounded-lg">

                        Delete Job

                    </button>

                </form>

            </div>

        </div>

    </div>

@endsection
