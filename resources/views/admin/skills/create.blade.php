@extends('layouts.admin')

@section('title', 'Create Skill')

@section('content')

    <div class="max-w-xl mx-auto">

        <div class="bg-white rounded-2xl shadow p-8">

            <h1 class="text-2xl font-bold mb-6">

                Add New Skill

            </h1>

            <form method="POST" action="{{ route('admin.skills.store') }}">

                @csrf

                <div class="mb-5">

                    <label class="font-medium">

                        Skill Name

                    </label>

                    <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg mt-2 p-3">

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

                        <option value="Backend">Backend</option>

                        <option value="Frontend">Frontend</option>

                        <option value="Database">Database</option>

                        <option value="DevOps">DevOps</option>

                        <option value="Cloud">Cloud</option>

                        <option value="Mobile">Mobile</option>

                        <option value="AI/ML">AI/ML</option>

                        <option value="Version Control">Version Control</option>

                    </select>

                </div>

                <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg">

                    Save Skill

                </button>

            </form>

        </div>

    </div>

@endsection
