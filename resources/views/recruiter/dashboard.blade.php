@extends('layouts.recruiter')

@section('title', 'Dashboard')
@section('content')
    <div class="space-y-8">

        <div>
            <h1 class="text-3xl font-bold">
                🤖 AI Recruiter Dashboard
            </h1>

            <p class="text-gray-500 mt-2">
                Manage jobs and discover the best candidates with AI.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


            <div class="bg-white p-6 rounded-2xl shadow">

                <h3 class="text-gray-500">
                    Total Jobs
                </h3>

                <p class="text-4xl font-bold mt-3">
                    {{ $totalJobs }}
                </p>

            </div>

            <div class="bg-white p-6 rounded-2xl shadow">

                <h3 class="text-gray-500">
                    Applications
                </h3>

                <p class="text-4xl font-bold mt-3">
                    {{ $totalApplications }}
                </p>

            </div>

            <div class="bg-white p-6 rounded-2xl shadow">

                <h3 class="text-gray-500">
                    Candidates
                </h3>

                <p class="text-4xl font-bold mt-3">
                    {{ $totalCandidates }}
                </p>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold mb-5">
                Recent Applications
            </h2>

            <div class="space-y-4">

                @foreach ($recentApplications as $application)
                    <div class="border rounded-xl p-4 flex justify-between">

                        <div>

                            <h3 class="font-bold">
                                {{ $application->candidate->name }}
                            </h3>


                            <p class="text-gray-500">
                                {{ $application->jobPost->title }}
                            </p>

                        </div>

                        <div>

                            <span class="px-3 py-1 bg-gray-100 rounded-full">
                                Applied
                            </span>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection
