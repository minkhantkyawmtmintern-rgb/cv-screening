@extends('layouts.admin')

@section('title', 'Skills Management')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold text-gray-800">

                    🛠 Skills Management

                </h1>

                <p class="text-gray-500 mt-2">

                    Manage skills available throughout the recruitment system.

                </p>

            </div>

            <a href="{{ route('admin.skills.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl">

                + Add Skill

            </a>

        </div>

        {{-- Success Message --}}

        @if (session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded mb-5">

                {{ session('success') }}

            </div>
        @endif

        {{-- Error Message --}}

        @if (session('error'))
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-5">

                {{ session('error') }}

            </div>
        @endif

        <form method="GET" class="flex gap-3 mb-5">

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search skills..."
                class="border rounded-lg px-4 py-2 w-80">

            <select name="category" class="border rounded-lg px-4 py-2">

                <option value="">All Categories</option>

                @foreach (['Backend', 'Frontend', 'Database', 'DevOps', 'Cloud', 'Mobile', 'AI/ML', 'Version Control'] as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>

                        {{ $category }}

                    </option>
                @endforeach

            </select>

            <button class="bg-indigo-600 text-white px-5 rounded-lg">

                Search

            </button>

        </form>
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="px-6 py-4">

                            <a
                                href="{{ route(
                                    'admin.skills.index',
                                    array_merge(request()->query(), [
                                        'sort' => 'name',
                                        'direction' => request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]),
                                ) }}">

                                Skill

                                @if (request('sort') == 'name')
                                    {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                @endif

                            </a>

                        </th>

                        <th class="px-6 py-4">

                            <a
                                href="{{ route(
                                    'admin.skills.index',
                                    array_merge(request()->query(), [
                                        'sort' => 'category',
                                        'direction' => request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]),
                                ) }}">

                                Category

                                @if (request('sort') == 'category')
                                    {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                @endif

                            </a>

                        </th>
                        <th class="px-6 py-4 text-center">

                            <a
                                href="{{ route(
                                    'admin.skills.index',
                                    array_merge(request()->query(), [
                                        'sort' => 'job_posts_count',
                                        'direction' => request('direction') == 'asc' ? 'desc' : 'asc',
                                    ]),
                                ) }}">

                                Jobs

                                @if (request('sort') == 'job_posts_count')
                                    {{ request('direction') == 'asc' ? '↑' : '↓' }}
                                @endif

                            </a>

                        </th>

                        <th class="text-center px-6 py-4">

                            Action

                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($skills as $skill)
                        <tr class="border-t hover:bg-gray-50">

                            <td class="px-6 py-4 font-medium">

                                {{ $skill->name }}

                            </td>

                            <td class="px-6 py-4">

                                <span
                                    class="px-3 py-1 rounded-full
                                   bg-indigo-100
                                   text-indigo-700
                                   text-sm">

                                    {{ $skill->category }}

                                </span>

                            </td>

                            <td class="text-center px-6 py-4">

                                {{ $skill->job_posts_count }}

                            </td>

                            <td class="text-center px-6 py-4">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('admin.skills.edit', $skill) }}"
                                        class="bg-yellow-500 text-white px-3 py-2 rounded">

                                        Edit

                                    </a>

                                    <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}">

                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Delete this skill?')"
                                            class="bg-red-600 text-white px-3 py-2 rounded">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center py-8 text-gray-500">

                                No skills found.

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>
        <div class="mt-6">

            {{ $skills->links() }}

        </div>
    </div>

@endsection
