<div class="bg-white rounded-2xl shadow p-8">

    <div class="flex flex-col lg:flex-row justify-between gap-6">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">

                {{ $jobPost->title }}

            </h1>

            <p class="text-gray-500 mt-2">

                {{ $jobPost->department }}

            </p>

        </div>

        <div class="flex flex-wrap items-center gap-3">

            <a href="{{ route('job-posts.edit', $jobPost) }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl">

                Edit Job

            </a>

            <a href="{{ route('recruiter.recommendations.index', $jobPost) }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl">

                🤖 View Intelligence

            </a>

            @if ($jobPost->is_active)
                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                    Active

                </span>
            @else
                <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-full">

                    Inactive

                </span>
            @endif

        </div>

    </div>

</div>
