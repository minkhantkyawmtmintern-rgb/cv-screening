@extends('layouts.candidate')

@section('content')

    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">
            <h1 class="text-3xl font-bold mb-6">
                Complete Your Profile
            </h1>

            @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-5">
                {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('candidate.profile.store') }}">
                @csrf
                <div class="grid md:grid-cols-2 gap-5">
                    <div>
                        <label>Phone</label>
                        <input name="phone" class="w-full rounded-xl border p-3">
                    </div>
                    @error('phone')
                    <p class="text-red-500 text-sm">
                    {{$message}}
                    </p>
                    @enderror

                    <div>
                        <label>Education</label>
                        <input name="education" class="w-full rounded-xl border p-3">
                    </div>

                    <div>
                        <label>University</label>
                        <input name="university" class="w-full rounded-xl border p-3">
                    </div>

                    <div>
                        <label>Major</label>
                        <input name="major" class="w-full rounded-xl border p-3">
                    </div>

                    <div>
                        <label>Experience Years</label>
                        <input type="number" name="experience_years" class="w-full rounded-xl border p-3">
                    </div>

                </div>

                <div class="mt-5">
                    <label>
                        Summary
                    </label>
                    <textarea name="summary" class="w-full rounded-xl border p-3" rows="5"></textarea>
                </div>

                <button class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-xl">
                    Save Profile
                </button>
            </form>

        </div>
    </div>
@endsection
