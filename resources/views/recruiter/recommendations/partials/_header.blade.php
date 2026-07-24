<div class="bg-white rounded-2xl shadow p-8">

    <div class="flex flex-col lg:flex-row justify-between gap-6">

        <div>

            <h1 class="text-4xl font-bold">
                🤖 AI Recommendation Center
            </h1>

            <p class="text-gray-500 mt-2">
                {{ $jobPost->title }}
            </p>

        </div>

        <div class="flex flex-wrap gap-3">

            <form method="POST" action="{{ route('recruiter.recommendations.generate', $jobPost) }}">

                @csrf
                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">
                    Refresh AI
                </button>

            </form>

            <button class="bg-green-600 text-white px-6 py-3 rounded-xl">
                Compare
            </button>

        </div>

    </div>

</div>
