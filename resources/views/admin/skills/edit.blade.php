@extends('layouts.admin')

@section('title', 'Update Skill')

@section('content')

    <div class="max-w-xl mx-auto">

        <div class="bg-white rounded-2xl shadow p-8">

            <h1 class="text-2xl font-bold mb-6">

                Edit Skill

            </h1>

            <form method="POST" action="{{ route('admin.skills.update', $skill) }}">

                @csrf
                @method('PUT')

                <div class="mb-5">

                    <label class="font-medium">

                        Skill Name

                    </label>

                    <input type="text" name="name" value="{{ old('name', $skill->name) }}"
                        class="w-full border rounded-lg mt-2 p-3">

                    @error('name')
                        <p class="text-red-500 mt-1">

                            {{ $message }}

                        </p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label class="font-medium">

                        Category

                    </label>

                    <select name="category" class="w-full border rounded-lg mt-2 p-3">

                            <option value="">Select Category</option>

                            <option value="Backend" {{ old('category', $skill->category) == 'Backend' ? 'selected' : '' }}>
                                Backend
                            </option>

                            <option value="Frontend"
                                {{ old('category', $skill->category) == 'Frontend' ? 'selected' : '' }}>
                                Frontend
                            </option>

                            <option value="Database"
                                {{ old('category', $skill->category) == 'Database' ? 'selected' : '' }}>
                                Database
                            </option>

                            <option value="DevOps" {{ old('category', $skill->category) == 'DevOps' ? 'selected' : '' }}>
                                DevOps
                            </option>

                            <option value="Cloud" {{ old('category', $skill->category) == 'Cloud' ? 'selected' : '' }}>
                                Cloud
                            </option>

                            <option value="Mobile" {{ old('category', $skill->category) == 'Mobile' ? 'selected' : '' }}>
                                Mobile
                            </option>

                            <option value="AI/ML" {{ old('category', $skill->category) == 'AI/ML' ? 'selected' : '' }}>
                                AI/ML
                            </option>

                            <option value="Version Control"
                                {{ old('category', $skill->category) == 'Version Control' ? 'selected' : '' }}>
                                Version Control
                            </option>

                    </select>

                </div>

                <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg">

                    Update Skill

                </button>

            </form>

        </div>

    </div>

@endsection
