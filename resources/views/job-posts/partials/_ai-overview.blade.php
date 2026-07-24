<div class="grid md:grid-cols-4 gap-5">

    <div class="bg-white shadow rounded-2xl p-6">

        <p class="text-gray-500">
            Applicants
        </p>

        <h2 class="text-4xl font-bold text-blue-600 mt-2">
            {{ $jobPost->applications_count }}
        </h2>

    </div>

    <div class="bg-white shadow rounded-2xl p-6">

        <p class="text-gray-500">
            Average Match
        </p>

        <h2 class="text-4xl font-bold text-green-600 mt-2">

            @if ($jobPost->applications_count)
                {{ number_format($jobPost->applications_avg_match_score, 1) }}%
            @else
                --
            @endif

        </h2>

    </div>

    <div class="bg-white shadow rounded-2xl p-6">

        <p class="text-gray-500">
            High Match
        </p>

        <h2 class="text-4xl font-bold text-purple-600 mt-2">
            {{ $jobPost->high_matched_applications_count }}
        </h2>

    </div>

    <div class="bg-white shadow rounded-2xl p-6">

        <p class="text-gray-500">
            Top Candidate
        </p>

        <h3 class="font-bold text-xl mt-2">
            {{ $topCandidate?->candidate?->name ?? '--' }}
        </h3>

    </div>

</div>
