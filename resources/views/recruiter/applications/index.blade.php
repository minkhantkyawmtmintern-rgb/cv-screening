@extends('layouts.recruiter')

@section('title', 'Applications')
@section('content')

    <div>
        <h1 class="text-3xl font-bold mb-6">
            Candidate Applications
        </h1>

        <div class="space-y-5">

            @foreach ($applications as $application)
                <div class="bg-white rounded-xl shadow p-6 flex justify-between">

                    <div>

                        <h2 class="text-xl font-bold">
                            {{ $application->candidate->name }}
                        </h2>

                        <p class="text-gray-500">
                            Applied for:
                            {{ $application->jobPost->title }}
                        </p>

                        <p class="mt-2">
                            Resume:
                            {{ $application->resume->file_name }}
                        </p>
                    </div>

                    <a href="{{ route('recruiter.applications.show', $application) }}"
                        class="px-5 py-2 bg-slate-900 text-white rounded-lg">
                        View
                    </a>

                </div>
            @endforeach

        </div>
    </div>

@endsection
