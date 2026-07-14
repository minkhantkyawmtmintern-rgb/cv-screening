@extends('layouts.candidate')

@section('content')
    <div class="max-w-xl mx-auto mt-10">
        <div class="bg-white shadow-xl rounded-2xl p-8">
            <h2 class="text-2xl font-bold mb-6">
                Upload Your Resume
            </h2>

            @if (session('success'))
                <div class="bg-green-100 p-3 rounded mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('candidate.resumes.store') }}" enctype="multipart/form-data">
                @csrf
                <label class="block mb-2 font-semibold">
                    Select CV
                </label>
                <input type="file" name="resume" class="border rounded-xl p-3 w-full">
                @error('resume')
                    <p class="text-red-500 mt-2">
                        {{ $message }}
                    </p>
                @enderror
                <button class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-xl">
                    Upload Resume
                </button>
            </form>
        </div>
    </div>
    
@endsection
