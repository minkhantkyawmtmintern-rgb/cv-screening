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
                🤖 AI Recruiter
            </h1>

            <nav class="space-y-3">
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    Dashboard
                </a>
                <a href="{{ route('job-posts.index') }}" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    Job Posts
                </a>
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    Candidates
                </a>
                <a href="#" class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                    Interviews
                </a>
            </nav>
        </aside>

        {{-- @if(session('success'))
        <div class="mb-6 bg-green-100 text-green-700 px-5 py-3 rounded-xl">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6 bg-red-100 text-red-700 px-5 py-3 rounded-xl">
            {{ session('error') }}
        </div>
        @endif
         --}}
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>

</html>
