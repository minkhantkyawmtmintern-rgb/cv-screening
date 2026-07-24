@extends('layouts.recruiter')

@section('title', 'AI Recommendation Center')

@section('content')

    <div class="max-w-7xl mx-auto space-y-8">

        @include('recruiter.recommendations.partials._header')

        @include('recruiter.recommendations.partials._summary')

        @include('recruiter.recommendations.partials._filters')

        <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">

            <div class="xl:col-span-3">

                <div class="space-y-6">

                    @forelse($candidates as $application)
                        @include('recruiter.recommendations.partials._candidate-card')

                    @empty
                        <div class="bg-white rounded-xl shadow p-10 text-center">
                            <h2 class="text-2xl font-bold">
                                No Candidates
                            </h2>
                        </div>
                    @endforelse

                </div>
            </div>

            <div>

                @include('recruiter.recommendations.partials._sidebar')

            </div>

        </div>

    </div>

@endsection
