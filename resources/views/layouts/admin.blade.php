<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title') - AI Recruitment
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

    <div class="flex">

        {{-- Sidebar --}}
        <aside class="w-64 min-h-screen bg-slate-900 text-white">

            <div class="p-6">

                <h2 class="text-2xl font-bold">

                    AI Recruitment

                </h2>

            </div>

            <nav class="space-y-2 px-4">

                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-gray-700">

                   🏠 Dashboard

                </a>

                {{-- <a href="#" class="block px-4 py-3 rounded-lg hover:bg-gray-700">

                    Recruiters

                </a>

                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-gray-700">

                    Candidates

                </a> --}}

                <a href="{{ route('admin.users.index') }}" class="block px-4 py-3 rounded-lg hover:bg-gray-700">
                    👥 Users
                </a>

                <a href="{{ route('admin.jobs.index') }}" class="block px-4 py-3 rounded-lg hover:bg-gray-700">

                    💼 Jobs

                </a>

                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-gray-700">

                   📄 Applications

                </a>

                {{-- <a href="#" class="block px-4 py-3 rounded-lg hover:bg-gray-700">

                    AI Reports

                </a> --}}

                <a href="{{ route('admin.analytics.index') }}" class="block px-4 py-3 rounded-lg hover:bg-gray-700">

                   📊 AI Analytics

                </a>
                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="w-full text-left px-4 py-3 rounded-lg hover:bg-red-600">

                        Logout

                    </button>

                </form>
            </nav>

        </aside>

        {{-- Content --}}
        <main class="flex-1 p-8">

            @yield('content')

        </main>

    </div>

</body>

</html>
