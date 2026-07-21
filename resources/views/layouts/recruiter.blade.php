<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title') - AI Recruiter
    </title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">
        <aside class="w-72 bg-slate-900 text-white p-6">

            <h1 class="text-2xl font-bold mb-10">
                🤖 AI Recruiter
            </h1>

            <nav class="space-y-3">

                <a href="{{ route('recruiter.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                   🏠 Dashboard
                </a>
                <a href="{{ route('job-posts.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    💼 Job Posts
                </a>

                <a href="{{ route('recruiter.applications.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    📄 Applications
                </a>

                {{-- <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    AI Recommendations
                </a> --}}

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button class="w-full text-left px-4 py-3 rounded-lg hover:bg-red-600">

                        Logout

                    </button>

                </form>
            </nav>
        </aside>

        <main class="flex-1 p-8">

            @if (session('success'))
                <div class="mb-5 bg-green-100 text-green-700 p-4 rounded-xl">

                    {{ session('success') }}

                </div>
            @endif

            @yield('content')

        </main>
    </div>

</body>

</html>
