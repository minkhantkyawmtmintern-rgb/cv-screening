@extends('layouts.candidate')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">
            <h1 class="text-3xl font-bold mb-6">
                Edit Profile
            </h1>

            <form method="POST" action="{{ route('candidate.profile.update') }}">
                @csrf
                @method('PUT')
                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label class="font-semibold">
                            Phone
                        </label>
                        <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}"
                            class="w-full rounded-xl border p-3">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="font-semibold">
                            Education
                        </label>
                        <input type="text" name="education" value="{{ old('education', $profile->education) }}"
                            class="w-full rounded-xl border p-3">
                        @error('education')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label class="font-semibold">
                            University
                        </label>
                        <input type="text" name="university" value="{{ old('university', $profile->university) }}"
                            class="w-full rounded-xl border p-3">
                    </div>

                    <div>
                        <label class="font-semibold">
                            Major
                        </label>
                        <input type="text" name="major" value="{{ old('major', $profile->major) }}"
                            class="w-full rounded-xl border p-3">
                    </div>

                    <div>
                        <label class="font-semibold">
                            Experience Years
                        </label>
                        <input type="number" name="experience_years"
                            value="{{ old('experience_years', $profile->experience_years) }}"
                            class="w-full rounded-xl border p-3">
                    </div>
                </div>

                <div class="mt-5">
                    <label class="font-semibold">
                        Summary
                    </label>
                    <textarea name="summary" rows="5" class="w-full rounded-xl border p-3">{{ old('summary', $profile->summary) }}</textarea>
                </div>
                <button class="mt-6 bg-green-600 text-white px-6 py-3 rounded-xl">
                    Update Profile
                </button>
            </form>
        </div>

    </div>
@endsection
