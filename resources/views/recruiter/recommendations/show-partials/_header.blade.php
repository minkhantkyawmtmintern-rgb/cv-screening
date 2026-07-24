<div class="bg-white rounded-2xl shadow p-8">

    <div class="flex justify-between items-center">

        <div>

            <a href="{{ route('recruiter.recommendations.index', $application->jobPost) }}" class="text-indigo-600">
                ← Back to Recommendation Center
            </a>

            <h1 class="text-3xl font-bold mt-4">
                {{ $application->candidate->name }}
            </h1>

            <p class="text-gray-500 mt-2">
                {{ $application->jobPost->title }}
            </p>

        </div>

        <a href="{{ route('recruiter.applications.resume', $application) }}"
            class="bg-indigo-600 text-white px-6 py-3 rounded-xl">
            📄 View Resume
        </a>

    </div>

</div>
