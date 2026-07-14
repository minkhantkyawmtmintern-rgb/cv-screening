@extends('layouts.candidate')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">
        <div class="flex justify-between mb-6">
            <h2 class="text-3xl font-bold">
                My Resumes
            </h2>

            <a href="{{ route('candidate.resumes.create') }}" class="bg-blue-600 text-white px-5 py-3 rounded-xl">
                Upload New
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 p-3 rounded mb-5">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-2xl overflow-hidden">
            <table class="w-full">
                <tr class="bg-gray-100">
                    <th class="p-4 text-left">
                        File
                    </th>
                    <th>
                        Type
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                @foreach ($resumes as $resume)
                    <tr class="border-t">
                        <td class="p-4">
                            {{ $resume->file_name }}
                        </td>
                        <td>
                            {{ $resume->file_type }}
                        </td>
                        <td>
                            <a href="{{ asset('storage/' . $resume->file_path) }}" target="_blank" class="text-blue-600">
                                View
                            </a>

                            <form method="POST" action="{{ route('candidate.resumes.destroy', $resume) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 ml-3">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
