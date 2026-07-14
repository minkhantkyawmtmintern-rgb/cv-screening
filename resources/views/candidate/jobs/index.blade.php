@extends('layouts.candidate')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold mb-8">
                Available Jobs
            </h1>
            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($jobs as $job)
                    <div class="bg-white rounded-2xl shadow p-6">
                        <h2 class="text-xl font-bold">
                            {{ $job->title }}
                        </h2>
                        <p class="text-gray-500 mt-2">
                            {{ $job->department }}
                        </p>
                        <p class="mt-3">
                            {{ $job->location }}
                        </p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach ($job->skills as $skill)
                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                    {{ $skill->name }}
                                </span>
                            @endforeach
                        </div>

                        <a href="{{ route('candidate.jobs.show', $job) }}"
                            class="inline-block mt-6 bg-blue-600 text-white px-5 py-3 rounded-xl">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
