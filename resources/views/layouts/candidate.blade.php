<!DOCTYPE html>
<html>

<head>
    <title>Candidate Portal</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white min-h-screen shadow">
            <div class="p-6 text-xl font-bold">
                AI Recruitment
            </div>
            <nav class="space-y-2 px-4">
                <a href="{{ route('candidate.dashboard') }}" class="block p-3 rounded-xl hover:bg-gray-100">
                    Dashboard
                </a>
                <a href="{{ route('candidate.jobs.index') }}" class="block p-3 rounded-xl hover:bg-gray-100">
                    Find Jobs
                </a>
                <a href="{{ route('candidate.applications.index') }}" class="block p-3 rounded-xl hover:bg-gray-100">
                    My Applications
                </a>
                <a href="{{ route('candidate.profile.show') }}" class="block p-3 rounded-xl hover:bg-gray-100">
                    Profile
                </a>
            </nav>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-8">

            @yield('content')

        </main>
    </div>

</body>

</html>
