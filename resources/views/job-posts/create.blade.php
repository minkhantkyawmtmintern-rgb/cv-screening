@extends('layouts.recruiter')
@section('title', 'Create Job')
@section('content')

    <div class="max-w-5xl mx-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">
                Create Job Intelligence Profile
            </h2>
            <p class="text-gray-500 mt-2">
                Define requirements for AI candidate matching
            </p>
        </div>

        <form method="POST" action="{{ route('job-posts.store') }}">

            @csrf
            <div class="bg-white rounded-2xl shadow p-8 mb-6">
                <h3 class="text-xl font-semibold mb-6">
                    1. Basic Information
                </h3>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="font-medium">
                            Job Title
                        </label>
                        <input name="title" class="w-full mt-2 border rounded-xl p-3"
                            placeholder="e.g. Backend Developer">
                    </div>
                    <div>
                        <label class="font-medium">
                            Department
                        </label>
                        <input name="department" class="w-full mt-2 border rounded-xl p-3" placeholder="Engineering">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="font-medium">
                        Job Description
                    </label>
                    <textarea name="description" rows="5" class="w-full mt-2 border rounded-xl p-3"
                        placeholder="Describe responsibilities..."></textarea>
                </div>
                <div class="grid grid-cols-3 gap-6 mt-6">
                    <div>
                        <label>
                            Experience Level
                        </label>
                        <select name="experience_level" class="w-full mt-2 border rounded-xl p-3">
                            <option value="junior">
                                Junior
                            </option>
                            <option value="mid">
                                Mid
                            </option>
                            <option value="senior">
                                Senior
                            </option>
                        </select>
                    </div>
                    <div>
                        <label>
                            Minimum Experience
                        </label>
                        <input type="number" name="minimum_experience" class="w-full mt-2 border rounded-xl p-3"
                            placeholder="Years">
                    </div>
                    <div>
                        <label>
                            Location
                        </label>
                        <input name="location" class="w-full mt-2 border rounded-xl p-3" placeholder="Yangon">
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow p-8">
                <h3 class="text-xl font-semibold mb-2">
                    2. Required Skills
                </h3>
                <p class="text-gray-500 mb-6">
                    Set importance weight for AI matching
                </p>

                @foreach ($skills as $skill)
                    <div class="flex items-center justify-between border rounded-xl p-4 mb-3">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="skills[{{ $skill->id }}][selected]" value="1"
                                class="w-5 h-5">
                            <div>
                                <h4 class="font-semibold">
                                    {{ $skill->name }}
                                </h4>
                                <span class="text-sm text-gray-500">
                                    {{ $skill->category }}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <label class="text-sm">
                                Importance
                            </label>
                            <input type="number" name="skills[{{ $skill->id }}][importance]" min="1"
                                max="5" value="3" class="w-20 border rounded-lg p-2">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 flex justify-end">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl">
                    Create Job Profile
                </button>
            </div>
        </form>

    </div>
@endsection
