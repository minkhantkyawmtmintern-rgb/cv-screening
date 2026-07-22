@extends('layouts.admin')

@section('title', 'Recruiter Management')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">

                    👔 Recruiter Management

                </h1>

                <p class="text-gray-500 mt-2">

                    Manage recruiter accounts and recruitment activities.

                </p>

            </div>

            <a href="{{ route('admin.recruiters.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl">

                + Add Recruiter

            </a>

        </div>

        {{-- Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-2xl shadow p-6">

                <p class="text-gray-500">

                    Total Recruiters

                </p>

                <h2 class="text-4xl font-bold text-indigo-600 mt-3">

                    {{ $statistics['total'] }}

                </h2>

            </div>

            <div class="bg-white rounded-2xl shadow p-6">

                <p class="text-gray-500">

                    Jobs Created

                </p>

                <h2 class="text-4xl font-bold text-green-600 mt-3">

                    {{ $statistics['jobs'] }}

                </h2>

            </div>

            <div class="bg-white rounded-2xl shadow p-6">

                <p class="text-gray-500">

                    Applications

                </p>

                <h2 class="text-4xl font-bold text-purple-600 mt-3">

                    {{ $statistics['applications'] }}

                </h2>

            </div>

        </div>

        {{-- Search --}}
        <form method="GET" class="bg-white rounded-2xl shadow p-5 mb-8">

            <div class="flex gap-3">

                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search recruiter..."
                    class="flex-1 border rounded-lg px-4 py-3">

                <button class="bg-indigo-600 text-white px-6 rounded-lg">

                    Search

                </button>

            </div>

        </form>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-5 bg-green-100 border border-green-300 text-green-700 p-4 rounded">

                {{ session('success') }}

            </div>
        @endif

        {{-- Table --}}

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left px-6 py-4">

                            Name

                        </th>

                        <th class="text-left px-6 py-4">

                            Email

                        </th>

                        <th class="text-center px-6 py-4">

                            Jobs

                        </th>

                        <th class="text-center px-6 py-4">

                            Joined

                        </th>

                        <th class="text-center px-6 py-4">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($recruiters as $recruiter)
                        <tr class="border-t hover:bg-gray-50">

                            <td class="px-6 py-4 font-medium">

                                {{ $recruiter->name }}

                            </td>

                            <td class="px-6 py-4">

                                {{ $recruiter->email }}

                            </td>

                            <td class="text-center px-6 py-4">

                                {{ $recruiter->job_posts_count ?? 0 }}

                            </td>

                            <td class="text-center px-6 py-4">

                                {{ $recruiter->created_at->format('d M Y') }}

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('admin.recruiters.show', $recruiter) }}"
                                        class="bg-blue-600 text-white px-3 py-2 rounded">

                                        View

                                    </a>

                                    <a href="{{ route('admin.recruiters.edit', $recruiter) }}"
                                        class="bg-yellow-500 text-white px-3 py-2 rounded">

                                        Edit

                                    </a>

                                    <form method="POST" action="{{ route('admin.recruiters.destroy', $recruiter) }}">

                                        @csrf

                                        @method('DELETE')

                                        <button onclick="return confirm('Delete this recruiter?')"
                                            class="bg-red-600 text-white px-3 py-2 rounded">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center py-8 text-gray-500">

                                No recruiter found.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-6">

            {{ $recruiters->links() }}

        </div>

    </div>

@endsection
