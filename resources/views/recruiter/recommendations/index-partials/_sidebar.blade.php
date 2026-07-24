<div class="space-y-6 sticky top-6">

    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-xl font-bold mb-5">
            📊 Hiring Insights
        </h2>

        <div class="space-y-4">

            <div class="flex justify-between">

                <span>
                    Applicants
                </span>

                <strong>
                    {{ $candidates->count() }}
                </strong>

            </div>

            <div class="flex justify-between">

                <span>
                    Average Match
                </span>

                <strong>
                    {{ number_format($candidates->avg('match_score'), 1) }}%
                </strong>

            </div>

            <div class="flex justify-between">

                <span>
                    High Match
                </span>

                <strong>
                    {{ $candidates->where('match_score', '>=', 80)->count() }}
                </strong>

            </div>

            <div class="flex justify-between">

                <span>
                    Best Score
                </span>

                <strong>
                    {{ $candidates->max('match_score') ?? 0 }}%
                </strong>

            </div>

        </div>

    </div>

    <div class="bg-gradient-to-br from-indigo-600 to-blue-700 rounded-2xl shadow p-6 text-white">

        <h2 class="text-xl font-bold mb-4">
            🤖 AI Suggestion
        </h2>

        <p class="leading-7 text-sm">

            Prioritize candidates with the highest AI score and review applicants
            missing only one or two required skills before making a hiring decision.

        </p>

    </div>

</div>
