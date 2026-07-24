<div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-xl font-bold">
        🧠 Skill Analysis
    </h2>

    <div class="grid md:grid-cols-2 gap-8 mt-6">

        <div>
            <h3 class="font-semibold text-green-700 mb-4">
                ✅ Matched Skills
            </h3>

            <div class="flex flex-wrap gap-2">

                @forelse($application->ai_feedback['matched_skills'] ?? [] as $skill)
                    <span class="bg-green-100 text-green-700 px-3 py-2 rounded-full">

                        {{ $skill }}
                    </span>
                @empty
                    <p class="text-gray-400">
                        No matched skills.
                    </p>
                @endforelse
            </div>
        </div>

        <div>

            <h3 class="font-semibold text-red-700 mb-4">
                ❌ Missing Skills
            </h3>

            <div class="flex flex-wrap gap-2">

                @forelse($application->ai_feedback['missing_skills'] ?? [] as $skill)
                    <span class="bg-red-100 text-red-700 px-3 py-2 rounded-full">
                        {{ $skill }}
                    </span>
                @empty

                    <p class="text-gray-400">
                        No missing skills.
                    </p>
                @endforelse

            </div>

        </div>

    </div>

</div>
