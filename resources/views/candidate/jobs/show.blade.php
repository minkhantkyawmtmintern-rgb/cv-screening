@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">
            <h1 class="text-4xl font-bold">
                {{ $jobPost->title }}
            </h1>
            <p class="mt-3 text-gray-600">
                {{ $jobPost->description }}
            </p>
            <h3 class="font-bold mt-8">
                Required Skills
            </h3>
            <div class="flex gap-3 mt-3 flex-wrap">
                @foreach ($jobPost->skills as $skill)
                    <span class="bg-gray-200 px-4 py-2 rounded-xl">
                        {{ $skill->name }}
                    </span>
                @endforeach
            </div>

            <a href="#" class="inline-block mt-10 bg-green-600 text-white px-6 py-3 rounded-xl">
                Apply Now
            </a>
        </div>
    </div>
@endsection
