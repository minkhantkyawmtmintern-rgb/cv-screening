@extends('layouts.recruiter')

@section('title', 'Edit Job')
@section('content')

    <div class="max-w-5xl mx-auto">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">
                Edit Job Intelligence Profile
            </h1>
            <p class="text-gray-500 mt-2">
                Update job requirements and AI matching criteria
            </p>
        </div>

        <form method="POST" action="{{ route('job-posts.update', $jobPost) }}">
            @csrf
            @method('PUT')
            <div class="bg-white rounded-2xl shadow p-8 mb-6">
                <h2 class="text-xl font-bold mb-6">
                    Basic Information
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="font-medium">
                            Job Title
                        </label>
                        <input name="title" value="{{ $jobPost->title }}" class="w-full mt-2 border rounded-xl p-3">
                    </div>
                    <div>
                        <label class="font-medium">
                            Department
                        </label>
                        <input name="department" value="{{ $jobPost->department }}"
                            class="w-full mt-2 border rounded-xl p-3">
                    </div>
                </div>

                <div class="mt-6">
                    <label class="font-medium">
                        Description
                    </label>
                    <textarea name="description" rows="5" class="w-full mt-2 border rounded-xl p-3">
                        {{ $jobPost->description }}
                    </textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div>
                        <label>
                            Experience
                        </label>
                        <select name="experience_level" class="w-full mt-2 border rounded-xl p-3">
                            <option value="junior" @if ($jobPost->experience_level == 'junior') selected @endif>
                                Junior
                            </option>
                            <option value="mid" @if ($jobPost->experience_level == 'mid') selected @endif>
                                Mid
                            </option>
                            <option value="senior" @if ($jobPost->experience_level == 'senior') selected @endif>
                                Senior
                            </option>
                        </select>
                    </div>
                    <div>
                        <label>
                            Minimum Experience
                        </label>
                        <input type="number" name="minimum_experience" value="{{ $jobPost->minimum_experience }}"
                            class="w-full mt-2 border rounded-xl p-3">
                    </div>
                    <div>
                        <label>
                            Location
                        </label>
                        <input name="location" value="{{ $jobPost->location }}" class="w-full mt-2 border rounded-xl p-3">
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow p-8">
                <h2 class="text-xl font-bold mb-2">
                    AI Skill Weight Configuration
                </h2>
                <p class="text-gray-500 mb-6">
                    Adjust importance score for candidate matching
                </p>
                @foreach ($skills as $skill)
                    @php
                        $selected = $jobPost->skills->contains($skill->id);

                        $importance =
                            optional($jobPost->skills->where('id', $skill->id)->first())->pivot->importance ?? 3;
                    @endphp
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border rounded-xl p-4 mb-3">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="skills[{{ $skill->id }}][selected]" value="1"
                                @if ($selected) checked @endif class="w-5 h-5">
                            <div>
                                <h4 class="font-semibold">
                                    {{ $skill->name }}
                                </h4>
                                <span class="text-sm text-gray-500">
                                    {{ $skill->category }}
                                </span>
                            </div>
                        </div>
                        <div>
                            <label class="text-sm">
                                Importance
                            </label>
                            <input type="number" min="1" max="5"
                                name="skills[{{ $skill->id }}][importance]" value="{{ $importance }}"
                                class="w-24 border rounded-lg p-2">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 flex justify-end">
                <button class="bg-blue-600 text-white px-8 py-3 rounded-xl">
                    Update Job Profile
                </button>
            </div>
        </form>
    </div>
@endsection
