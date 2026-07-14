@extends('layouts.candidate')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow p-8">
            <h1 class="text-3xl font-bold mb-6">
                Apply For:
                {{ $jobPost->title }}
            </h1>

            <form method="POST" action="{{ route('candidate.jobs.apply', $jobPost) }}">
                @csrf
                <label class="font-semibold">
                    Select Resume
                </label>
                <div class="mt-4 space-y-3">
                    @forelse($resumes as $resume)
                        <label class="flex items-center gap-3 border rounded-xl p-4 cursor-pointer">
                            <input type="radio" name="resume_id" value="{{ $resume->id }}">
                            <span>
                                {{ $resume->file_name }}
                            </span>
                        </label>
                    @empty
                        <div class="bg-yellow-100 p-4 rounded-xl">
                            Please upload resume first.
                        </div>
                    @endforelse
                </div>
                @error('resume_id')
                    <p class="text-red-500 mt-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mt-6">
                    <label class="font-semibold">
                        Cover Letter (Optional)
                    </label>
                    <textarea name="cover_letter" rows="5" class="w-full border rounded-xl p-3 mt-2"></textarea>
                </div>

                <button class="mt-6 bg-blue-600 text-white px-6 py-3 rounded-xl">
                    Submit Application
                </button>
            </form>
        </div>
    </div>
@endsection
