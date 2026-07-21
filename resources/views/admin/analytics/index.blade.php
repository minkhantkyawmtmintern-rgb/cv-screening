@extends('layouts.admin')

@section('title', 'AI Analytics')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}

        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                🤖 AI Recruitment Analytics
            </h1>

            <p class="text-gray-500 mt-2">
                Monitor AI screening performance and recruitment insights.
            </p>

        </div>

        {{-- Overview Cards --}}

        <div class="grid grid-cols-1 md:grid-cols-5 gap-5 mb-10">

            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500">
                   👥 Users
                </p>

                <h2 class="text-3xl font-bold text-indigo-600">

                    {{ $overview['total_users'] }}

                </h2>

            </div>

            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500">
                    💼 Jobs
                </p>

                <h2 class="text-3xl font-bold text-blue-600">

                    {{ $overview['total_jobs'] }}

                </h2>

            </div>

            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500">
                    📄 Applications
                </p>

                <h2 class="text-3xl font-bold text-green-600">

                    {{ $overview['total_applications'] }}

                </h2>

            </div>

            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500">
                    🤖 AI Screened
                </p>

                <h2 class="text-3xl font-bold text-purple-600">

                    {{ $overview['ai_processed'] }}

                </h2>

            </div>

            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500">
                    ⭐ Average Score
                </p>

                <h2 class="text-3xl font-bold text-orange-600">

                    {{ $overview['average_score'] }}%

                </h2>

            </div>

        </div>

        {{-- Top Candidates --}}

        <div class="bg-white rounded-xl shadow p-6 mb-8">

            <h2 class="text-xl font-bold mb-5">

                🏆 Top AI Recommended Candidates

            </h2>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-100">

                        <tr>

                            <th class="p-3 text-left">
                                Candidate
                            </th>

                            <th class="p-3 text-left">
                                Job
                            </th>

                            <th class="p-3 text-left">
                                Match Score
                            </th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($topCandidates as $application)
                            <tr class="border-t">

                                <td class="p-3">

                                    {{ $application->candidate->name }}

                                </td>

                                <td class="p-3">

                                    {{ $application->jobPost->title }}

                                </td>

                                <td class="p-3">

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">

                                        {{ $application->match_score }}%

                                    </span>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
        </div>

        {{-- Missing Skills --}}

        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-bold mb-5">

                📉 Common Missing Skills From Candidates

            </h2>

            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">

                @foreach ($skills as $skill => $count)
                    <div class="bg-gray-50 rounded-xl p-4 text-center">

                        <h3 class="font-bold text-indigo-600">

                            {{ ucfirst($skill) }}

                        </h3>

                        <p class="text-gray-500 text-sm">

                            Missing {{ $count }} times

                        </p>

                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
