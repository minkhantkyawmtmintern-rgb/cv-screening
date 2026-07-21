@extends('layouts.admin')

@section('title', 'User Management')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                👥 User Management
            </h1>

            <p class="text-gray-500 mt-2">
                Manage system users and roles.
            </p>

        </div>


        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">


            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500">
                    Total Users
                </p>

                <h2 class="text-3xl font-bold text-indigo-600">
                    {{ $stats['total'] }}
                </h2>

            </div>


            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500">
                    Admins
                </p>

                <h2 class="text-3xl font-bold text-purple-600">
                    {{ $stats['admins'] }}
                </h2>

            </div>


            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500">
                    Recruiters
                </p>

                <h2 class="text-3xl font-bold text-blue-600">
                    {{ $stats['recruiters'] }}
                </h2>

            </div>


            <div class="bg-white rounded-xl shadow p-5">

                <p class="text-gray-500">
                    Candidates
                </p>

                <h2 class="text-3xl font-bold text-green-600">
                    {{ $stats['candidates'] }}
                </h2>

            </div>


        </div>



        {{-- Search Filter --}}

        <div class="bg-white rounded-xl shadow p-5 mb-6">


            <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col md:flex-row gap-4">


                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or email..."
                    class="border rounded-lg px-4 py-2 flex-1">


                <select name="role" class="border rounded-lg px-4 py-2">


                    <option value="">
                        All Roles
                    </option>


                    <option value="admin" @selected(request('role') == 'admin')>
                        Admin
                    </option>


                    <option value="recruiter" @selected(request('role') == 'recruiter')>
                        Recruiter
                    </option>


                    <option value="candidate" @selected(request('role') == 'candidate')>
                        Candidate
                    </option>


                </select>


                <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg">

                    Search

                </button>


            </form>


        </div>



        {{-- User Table --}}

        <div class="bg-white rounded-xl shadow overflow-hidden">


            <table class="w-full">


                <thead class="bg-gray-100">


                    <tr>

                        <th class="p-4 text-left">
                            Name
                        </th>

                        <th class="p-4 text-left">
                            Email
                        </th>

                        <th class="p-4 text-left">
                            Role
                        </th>

                        <th class="p-4 text-left">
                            Created
                        </th>

                    </tr>


                </thead>



                <tbody>


                    @foreach ($users as $user)
                        <tr class="border-t">


                            <td class="p-4">

                                {{ $user->name }}

                            </td>


                            <td class="p-4">

                                {{ $user->email }}

                            </td>


                            <td class="p-4">


                                @if ($user->role == 'admin')
                                    <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700">

                                        Admin

                                    </span>
                                @elseif($user->role == 'recruiter')
                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700">

                                        Recruiter

                                    </span>
                                @else
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">

                                        Candidate

                                    </span>
                                @endif


                            </td>


                            <td class="p-4 text-gray-500">

                                {{ $user->created_at->format('d M Y') }}

                            </td>


                        </tr>
                    @endforeach


                </tbody>


            </table>


        </div>



        <div class="mt-5">

            {{ $users->links() }}

        </div>


    </div>


@endsection
