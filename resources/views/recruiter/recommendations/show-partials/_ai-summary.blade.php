<div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-xl font-bold flex items-center gap-2">
        🤖 AI Summary
    </h2>

    <div class="mt-5">

        <p class="text-gray-700 leading-8">
            {{ $application->ai_feedback['summary'] ?? 'No AI summary available.' }}
        </p>

    </div>

    <div class="mt-8 border-t pt-5">

        <h3 class="font-semibold text-gray-700">
            AI Recommendation
        </h3>

        @php
            $score = $application->match_score ?? 0;
        @endphp

        @if ($score >= 80)
            <div class="mt-3 bg-green-50 border border-green-200 rounded-xl p-4">

                <p class="text-green-700 font-semibold">
                    ✅ Strongly Recommended
                </p>

                <p class="text-green-600 text-sm mt-2">
                    Proceed directly to the Technical Interview stage.
                </p>

            </div>
        @elseif($score >= 60)
            <div class="mt-3 bg-yellow-50 border border-yellow-200 rounded-xl p-4">

                <p class="text-yellow-700 font-semibold">
                    👍 Recommended
                </p>

                <p class="text-yellow-600 text-sm mt-2">
                    Suitable candidate. Manual review is recommended.
                </p>

            </div>
        @else
            <div class="mt-3 bg-red-50 border border-red-200 rounded-xl p-4">

                <p class="text-red-700 font-semibold">
                    ⚠ Needs Review
                </p>

                <p class="text-red-600 text-sm mt-2">
                    Candidate does not currently satisfy most job requirements.
                </p>

            </div>
        @endif

    </div>

</div>
