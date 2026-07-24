@extends('layouts.recruiter')

@section('title', 'AI Candidate Report')

@section('content')

    <div class="max-w-7xl mx-auto space-y-8">

        @include('recruiter.recommendations.show-partials._header')

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

            <div class="xl:col-span-2 space-y-6">

                @include('recruiter.recommendations.show-partials._ai-summary')

                @include('recruiter.recommendations.show-partials._skill-analysis')

            </div>

            <div class="space-y-6">

                @include('recruiter.recommendations.show-partials._ai-score')

                @include('recruiter.recommendations.show-partials._candidate-profile')

                {{-- @include('recruiter.recommendations.show-partials._recruiter-actions') --}}

            </div>

        </div>

    </div>

@endsection
