<div class="bg-white rounded-2xl shadow p-6 text-center">

    <h2 class="font-bold text-xl">
        AI Match Score
    </h2>

    <div class="w-40 h-40 rounded-full bg-indigo-100 flex items-center justify-center mx-auto mt-6">

        <span class="text-5xl font-bold text-indigo-700">
            {{ $application->match_score }}%
        </span>

    </div>

    <div class="mt-6">

        @if ($application->match_score >= 80)
            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
                ⭐ Highly Recommended
            </span>
        @elseif($application->match_score >= 60)
            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full">
                👍 Recommended
            </span>
        @else
            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">
                ⚠ Needs Review
            </span>
        @endif

    </div>

</div>
