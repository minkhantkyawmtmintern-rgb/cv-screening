@extends('layouts.candidate ')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-6xl mx-auto">
            <h1 class="text-3xl font-bold mb-8">
                My Applications
            </h1>

            <div class="space-y-5">
                @forelse($applications as $application)
                    <div class="bg-white rounded-2xl shadow p-6">
                        <div class="flex justify-between">
                            <div>
                                <h2 class="text-xl font-bold">
                                    {{ $application->jobPost->title }}
                                </h2>
                                <p class="text-gray-500">
                                    {{ $application->jobPost->department }}
                                </p>
                            </div>

                            <div>
                                @if ($application->match_score)
                                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
                                        AI Score:
                                        {{ $application->match_score }}%
                                    </span>
                                @else
                                    <span class="bg-gray-100 px-4 py-2 rounded-full">
                                        Pending AI Analysis
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mt-5">
                            <p>
                                Resume:
                                {{ $application->resume->file_name }}
                            </p>
                            <p>
                                Applied:
                                {{ $application->created_at->format('d M Y') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-6 rounded-xl">
                        No applications found.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
