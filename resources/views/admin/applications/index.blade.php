@extends('layouts.admin')

@section('title', 'Applications Management')

@section('content')

    <div class="max-w-7xl mx-auto">

        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                📄 Applications Management
            </h1>

            <p class="text-gray-500 mt-2">
                Monitor all candidate applications and AI evaluation results.
            </p>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-4 text-left">Candidate</th>

                        <th class="px-6 py-4 text-left">Job</th>

                        <th class="px-6 py-4 text-center">AI Score</th>

                        <th class="px-6 py-4 text-center">Applied</th>

                        <th class="px-6 py-4 text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($applications as $application)
                        <tr class="border-t hover:bg-gray-50">

                            <td class="px-6 py-4">

                                <div class="font-semibold">

                                    {{ $application->candidate->name }}

                                </div>

                                <div class="text-sm text-gray-500">

                                    {{ $application->candidate->email }}

                                </div>

                            </td>

                            <td class="px-6 py-4">

                                {{ $application->jobPost->title }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                @if ($application->match_score)
                                    <span class="font-bold text-indigo-600">

                                        {{ $application->match_score }}%

                                    </span>
                                @else
                                    <span class="text-gray-400">

                                        --

                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-4 text-center">

                                {{ $application->created_at->format('d M Y') }}

                            </td>

                            <td class="px-6 py-4 text-center">

                                <a href="{{ route('admin.applications.show', $application) }}"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">

                                    View

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-8 text-gray-500">

                                No applications found.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection
