@extends('layouts.admin')

@section('title', 'Jobs Management')

@section('content')

    <div class="max-w-7xl mx-auto">

        <div class="mb-6">

            <h1 class="text-3xl font-bold">
                💼 Jobs Management
            </h1>

            <p class="text-gray-500 mt-2">
                Monitor all recruiter job postings
            </p>

        </div>

        <div class="bg-white rounded-xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="p-4 text-left">
                            Job Title
                        </th>

                        <th class="p-4 text-left">
                            Creator
                        </th>

                        <th class="p-4 text-left">
                            Skills
                        </th>

                        <th class="p-4 text-left">
                            Status
                        </th>

                        <th class="p-4">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($jobs as $job)

                        <tr class="border-t">

                            <td class="p-4">

                                <div class="font-semibold">
                                    {{ $job->title }}
                                </div>


                                <div class="text-sm text-gray-500">
                                    {{ $job->department }}
                                </div>

                            </td>

                            <td class="p-4">

                                {{ $job->creator?->name ?? 'Deleted User' }}

                            </td>

                            <td class="p-4">

                                @foreach ($job->skills as $skill)
                                    <span class="px-2 py-1 bg-indigo-100 text-indigo-600 rounded text-sm">

                                        {{ $skill->name }}

                                    </span>
                                @endforeach

                            </td>

                            <td class="p-4">

                                @if ($job->is_active)
                                    <span class="text-green-600">
                                        Active
                                    </span>
                                @else
                                    <span class="text-red-600">
                                        Closed
                                    </span>
                                @endif

                            </td>

                            <td class="p-4">


                                <a href="{{ route('admin.jobs.show', $job) }}"
                                    class="px-3 py-2 bg-indigo-600 text-white rounded">

                                    View

                                </a>


                            </td>


                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="p-6 text-center text-gray-500">

                                No jobs found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>


            </table>


        </div>

    </div>

@endsection
