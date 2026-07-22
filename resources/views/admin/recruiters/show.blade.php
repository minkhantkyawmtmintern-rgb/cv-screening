@extends('layouts.admin')

@section('title', 'Recruiter Profile')

@section('content')

    <div class="max-w-6xl mx-auto">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">

                    👤 Recruiter Profile

                </h1>

                <p class="text-gray-500 mt-2">

                    View recruiter details and activity.

                </p>

            </div>

            <a href="{{ route('admin.recruiters.edit', $recruiter) }}" class="bg-indigo-600 text-white px-5 py-3 rounded-xl">

                Edit Recruiter

            </a>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Profile --}}
            <div class="bg-white rounded-2xl shadow p-6">

                <div class="text-center">

                    <div class="w-24 h-24 rounded-full bg-indigo-100 mx-auto flex items-center justify-center">

                        <span class="text-3xl font-bold text-indigo-600">

                            {{ strtoupper(substr($recruiter->name, 0, 1)) }}

                        </span>

                    </div>

                    <h2 class="text-xl font-bold mt-4">

                        {{ $recruiter->name }}

                    </h2>

                    <p class="text-gray-500">

                        {{ $recruiter->email }}

                    </p>

                </div>

                <hr class="my-6">

                <div class="space-y-3">

                    <div class="flex justify-between">

                        <span>Role</span>

                        <span class="font-semibold">

                            Recruiter

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Joined</span>

                        <span>

                            {{ $recruiter->created_at->format('d M Y') }}

                        </span>

                    </div>

                </div>

            </div>

            {{-- Statistics --}}
            <div class="lg:col-span-2 space-y-6">

                <div class="grid grid-cols-2 gap-6">

                    <div class="bg-white rounded-2xl shadow p-6">

                        <p class="text-gray-500">

                            Jobs Created

                        </p>

                        <h2 class="text-4xl font-bold text-indigo-600 mt-3">

                            {{ $recruiter->job_posts_count }}

                        </h2>

                    </div>

                    <div class="bg-white rounded-2xl shadow p-6">

                        <p class="text-gray-500">

                            Account Status

                        </p>

                        <h2 class="text-xl font-bold text-green-600 mt-4">

                            Active

                        </h2>

                    </div>

                </div>

                {{-- Recent Jobs --}}

                <div class="bg-white rounded-2xl shadow">

                    <div class="p-6 border-b">

                        <h3 class="font-bold text-lg">

                            Recent Job Posts

                        </h3>

                    </div>

                    <div class="divide-y">

                        @forelse($recruiter->jobPosts as $job)
                            <div class="p-5">

                                <div class="font-semibold">

                                    {{ $job->title }}

                                </div>

                                <div class="text-gray-500 text-sm mt-1">

                                    {{ $job->department }}

                                </div>

                            </div>

                        @empty

                            <div class="p-8 text-center text-gray-400">

                                No job posts yet.

                            </div>
                        @endforelse

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
