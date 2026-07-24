@extends('layouts.recruiter')

@section('title', 'Job Intelligence')

@section('content')

    <div class="max-w-7xl mx-auto space-y-8">

        @include('job-posts.partials._header')

        @include('job-posts.partials._ai-overview')

        @include('job-posts.partials._job-details')

        @include('job-posts.partials._requirement-profile')

        @include('job-posts.partials._ai-insight')

        @include('job-posts.partials._quick-actions')

    </div>

@endsection
