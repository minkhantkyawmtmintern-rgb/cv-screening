@extends('layouts.candidate')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">
                    My Profile
                </h1>
                <a href="{{ route('candidate.profile.edit') }}" class="bg-blue-600 text-white px-5 py-3 rounded-xl">
                    Edit Profile
                </a>
            </div>
            <div class="mt-8 space-y-4">
                <div>
                    <strong>Phone:</strong>
                    {{ $profile->phone ?? '-' }}
                </div>
                <div>
                    <strong>Education:</strong>
                    {{ $profile->education ?? '-' }}
                </div>
                <div>
                    <strong>University:</strong>
                    {{ $profile->university ?? '-' }}
                </div>
                <div>
                    <strong>Major:</strong>
                    {{ $profile->major ?? '-' }}
                </div>
                <div>
                    <strong>Experience:</strong>
                    {{ $profile->experience_years ?? 0 }} years
                </div>
                <div>
                    <strong>Summary:</strong>
                    <p class="mt-2 text-gray-600">
                        {{ $profile->summary ?? '-' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
