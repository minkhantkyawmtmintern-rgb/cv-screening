<div class="grid md:grid-cols-4 gap-5">

    <div class="bg-white shadow rounded-xl p-6">

        <p class="text-gray-500">
            Applicants
        </p>

        <h2 class="text-4xl font-bold text-indigo-600">
            {{ $candidates->count() }}
        </h2>

    </div>

    <div class="bg-white shadow rounded-xl p-6">

        <p class="text-gray-500">
            Average Match
        </p>

        <h2 class="text-4xl font-bold text-green-600">
            {{ number_format($candidates->avg('match_score'), 1) }}%
        </h2>

    </div>

    <div class="bg-white shadow rounded-xl p-6">

        <p class="text-gray-500">
            High Match
        </p>

        <h2 class="text-4xl font-bold text-purple-600">
            {{ $candidates->where('match_score', '>=', 80)->count() }}
        </h2>

    </div>

    <div class="bg-white shadow rounded-xl p-6">

        <p class="text-gray-500">
            Best Score
        </p>

        <h2 class="text-4xl font-bold text-yellow-500">
            {{ $candidates->max('match_score') ?? 0 }}%
        </h2>

    </div>

</div>
