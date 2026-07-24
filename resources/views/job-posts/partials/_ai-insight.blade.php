<div class="bg-gradient-to-r from-indigo-600 to-blue-600 rounded-2xl shadow p-8 text-white">

    <h2 class="text-2xl font-bold mb-4">
        🤖 AI Insight
    </h2>

    <p class="leading-8">
        Most applicants have strong Laravel and PHP skills.
    </p>

    <p class="leading-8 mt-3">
        Docker is the most commonly missing skill.
    </p>

    <p class="leading-8 mt-3">
        Average AI Match Score is
        <strong>

            @if ($jobPost->applications_count)
                {{ number_format($jobPost->applications_avg_match_score, 1) }}%
            @else
                --
            @endif

        </strong>

    </p>

    <div class="mt-6">

        <span class="bg-white text-indigo-700 px-5 py-3 rounded-xl font-semibold">
            Recommendation:
            Search candidates with Docker experience.
        </span>

    </div>

</div>
