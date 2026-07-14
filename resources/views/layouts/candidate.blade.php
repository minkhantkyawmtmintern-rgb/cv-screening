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
    <div class="flex min-h-screen">

        <aside class="w-64 bg-slate-900 text-white p-6">
            <h1 class="text-2xl font-bold mb-10">
                🤖 AI Candidate
            </h1>
            <nav class="space-y-3">
                <a href="{{ route('candidate.dashboard') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                   🏠 Dashboard
                </a>
                <a href="{{ route('candidate.jobs.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                   🔍 Explore Jobs
                </a>
                <a href="{{ route('candidate.applications.index') }}"
                    class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    📄 My Applications
                </a>
                <a href="{{ route('candidate.resumes.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    📑 My Resume
                </a>
                <a href="{{ route('candidate.profile.show') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    👤 Profile
                </a>
            </nav>
        </aside>

        
        <main class="flex-1 p-8">
            @if (session('success'))
                <div class="mb-6 bg-green-100 text-green-700 px-5 py-3 rounded-xl">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-100 text-red-700 px-5 py-3 rounded-xl">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>

</html>
