<div class="bg-white rounded-2xl shadow p-8">

    <h2 class="text-2xl font-bold mb-6">
        Quick Actions
    </h2>

    <div class="flex flex-wrap gap-4">

        <a href="{{ route('recruiter.recommendations.index', $jobPost) }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">
            🤖 Generate AI Recommendation
        </a>

        <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl">
            📄 View Applications
        </a>

        <a href="{{ route('job-posts.edit', $jobPost) }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">
            ✏ Edit Job
        </a>

    </div>

</div>
