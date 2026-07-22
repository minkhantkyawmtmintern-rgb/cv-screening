@extends('layouts.admin')

@section('title', 'Create Recruiter')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-800">

                Create Recruiter

            </h1>

            <p class="text-gray-500 mt-2">

                Add a new recruiter account to the system.

            </p>

        </div>

        <div class="bg-white rounded-2xl shadow p-8">

            <form method="POST" action="{{ route('admin.recruiters.store') }}">

                @csrf

                {{-- Name --}}
                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Full Name

                    </label>

                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border rounded-lg px-4 py-3">

                    @error('name')
                        <p class="text-red-500 mt-2">

                            {{ $message }}

                        </p>
                    @enderror

                </div>

                {{-- Email --}}
                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Email

                    </label>

                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded-lg px-4 py-3">

                    @error('email')
                        <p class="text-red-500 mt-2">

                            {{ $message }}

                        </p>
                    @enderror

                </div>

                {{-- Password --}}
                <div class="mb-6">

                    <label class="block font-semibold mb-2">

                        Password

                    </label>

                    <input type="password" name="password" class="w-full border rounded-lg px-4 py-3">

                    @error('password')
                        <p class="text-red-500 mt-2">

                            {{ $message }}

                        </p>
                    @enderror

                </div>

                {{-- Confirm Password --}}
                <div class="mb-8">

                    <label class="block font-semibold mb-2">

                        Confirm Password

                    </label>

                    <input type="password" name="password_confirmation" class="w-full border rounded-lg px-4 py-3">

                </div>

                <div class="flex justify-end gap-3">

                    <a href="{{ route('admin.recruiters.index') }}" class="px-6 py-3 rounded-lg bg-gray-200">

                        Cancel

                    </a>

                    <button class="px-6 py-3 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">

                        Create Recruiter

                    </button>

                </div>

            </form>

        </div>

    </div>

@endsection
