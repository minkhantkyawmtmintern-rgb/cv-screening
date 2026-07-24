<div class="bg-white rounded-2xl shadow hover:shadow-xl transition p-6">

    <div class="flex flex-col lg:flex-row justify-between gap-6">

        {{-- Left --}}
        <div class="flex gap-5">

            <div
                class="w-16 h-16 rounded-full bg-indigo-100 flex items-center justify-center text-2xl font-bold text-indigo-600">
                {{ strtoupper(substr($application->candidate->name, 0, 1)) }}
            </div>

            <div>

                <div class="flex items-center gap-3">

                    <h2 class="text-2xl font-bold">
                        {{ $application->candidate->name }}
                    </h2>

                    @if ($loop->first)
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">
                            🏆 Top Candidate
                        </span>
                    @endif

                </div>

                <p class="text-gray-500 mt-1">
                    {{ $application->candidate->email }}
                </p>

                <p class="text-sm text-gray-400 mt-2">
                    Resume :
                    {{ $application->resume->file_name ?? 'No Resume' }}
                </p>

                <div class="flex flex-wrap gap-2 mt-4">

                    @foreach ($application->ai_feedback['matched_skills'] ?? [] as $skill)
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                            {{ $skill }}
                        </span>
                    @endforeach

                </div>

            </div>

        </div>

        {{-- Right --}}
        <div class="lg:w-72">

            <div class="flex justify-between mb-2">

                <span class="font-semibold">
                    AI Match Score
                </span>

                <span class="font-bold text-indigo-600">
                    {{ $application->match_score ?? 0 }}%
                </span>

            </div>

            <div class="w-full bg-gray-200 rounded-full h-3">

                <div class="bg-indigo-600 h-3 rounded-full" style="width: {{ $application->match_score ?? 0 }}%">

                </div>

            </div>

            @php
                $score = $application->match_score ?? 0;
            @endphp

            <div class="mt-4">

                @if ($score >= 80)
                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
                        ⭐ Highly Recommended
                    </span>
                @elseif($score >= 60)
                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full">
                        👍 Recommended
                    </span>
                @else
                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">
                        ⚠ Needs Review
                    </span>
                @endif

            </div>

            <div class="mt-5 flex flex-wrap gap-2">

                <a href="{{ route('recruiter.recommendations.show', $application) }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                    AI Report
                </a>

                <a href="{{ route('recruiter.applications.resume', $application) }}"
                    class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded-lg">
                    Resume
                </a>

            </div>

        </div>

    </div>

</div>
