@extends('layouts.app')

@section('title', 'Job Posts')
@section('content')

    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">
            Job Intelligence Center
        </h2>
        <a href="{{ route('job-posts.create') }}" class="bg-blue-600 text-white px-5 py-3 rounded-xl">
            + Create Job
        </a>
    </div>

    <div class="grid grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex justify-between">
                    <h3 class="text-xl font-bold">
                        {{ $job->title }}
                    </h3>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        Active
                    </span>
                </div>
                <p class="text-gray-500 mt-3">
                    {{ $job->department }}
                </p>
                <div class="mt-5">
                    <h4 class="font-semibold">
                        Required Skills
                    </h4>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach ($job->skills as $skill)
                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">
                                {{ $skill->name }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div class="mt-6 flex justify-between">
                    <div class="flex gap-16">
                        <a href="{{route('job-posts.show',$job)}}" class="text-blue-600 hover:underline">
                            View Intelligence
                        </a>
                        <a href="{{route('job-posts.edit',$job)}}" class="text-gray-600 hover:underline">
                            Edit
                        </a>
                    </div>
                    <form method="POST" action="{{route('job-posts.destroy',$job)}}" onsubmit="return confirm('Delete this job profile?')">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
