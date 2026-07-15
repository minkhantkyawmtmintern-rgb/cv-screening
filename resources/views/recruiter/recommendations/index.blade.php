@extends('layouts.recruiter')

@section('title', 'AI Recommendations')
@section('content')

    <div class="max-w-7xl mx-auto">
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                🤖 AI Candidate Recommendations
            </h1>

            <p class="text-gray-500 mt-2">
                Find the best candidates for:
                <span class="font-semibold text-indigo-600">
                    {{ $jobPost->title }}
                </span>
            </p>

        </div>
        <form method="POST" action="{{ route('recruiter.recommendations.generate', $jobPost) }}">

            @csrf

            <button class="bg-indigo-600 text-white px-5 py-3 mb-3 rounded-xl">

                🤖 Generate AI Recommendation

            </button>

        </form>

        <div class="space-y-6">

            @forelse($candidates as $application)
                <div class="bg-white rounded-2xl shadow p-6">
                    <div class="flex justify-between items-start">

                        <div>
                            <h2 class="text-xl font-bold text-gray-800">
                                {{ $application->candidate->name }}
                            </h2>

                            <p class="text-gray-500">
                                Applied for:
                                {{ $application->jobPost->title }}
                            </p>

                            <p class="text-sm text-gray-400 mt-2">
                                Resume:
                                {{ $application->resume->file_name }}
                            </p>
                        </div>

                        <div class="text-center">
                            <div class="w-20 h-20 rounded-full bg-indigo-100 flex items-center justify-center">

                                <span class="text-2xl font-bold text-indigo-600">
                                    {{ $application->match_score ?? '--' }}

                                    @if ($application->match_score)
                                        %
                                    @endif

                                </span>

                            </div>

                            <p class="text-sm text-gray-500 mt-2">
                                Match Score
                            </p>

                        </div>
                    </div>

                    <div class="mt-6 bg-gray-50 rounded-xl p-5">


                        <h3 class="font-semibold text-gray-700 mb-3">

                            🤖 AI Feedback

                        </h3>


                        @if ($application->ai_feedback)
                            <p class="text-gray-600">

                                {{ $application->ai_feedback['summary'] ?? 'No feedback available.' }}

                            </p>
                        @else
                            <p class="text-gray-400">

                                AI analysis has not been generated yet.

                            </p>
                        @endif


                    </div>



                    {{-- Action --}}
                    <div class="mt-5 flex gap-3">


                        <a href="#" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">

                            View Profile

                        </a>


                        <a href="{{ route('recruiter.applications.resume', $application) }}"
                            class="px-4 py-2 bg-gray-800 text-white rounded-lg">

                            View Resume

                        </a>


                    </div>



                </div>


            @empty


                <div class="bg-white p-8 rounded-xl text-center">

                    <p class="text-gray-500">

                        No applicants found.

                    </p>

                </div>
            @endforelse



        </div>


    </div>


@endsection
