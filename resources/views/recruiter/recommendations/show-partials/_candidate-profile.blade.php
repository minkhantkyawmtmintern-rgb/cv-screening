<div class="bg-white rounded-2xl shadow p-6">

    <h2 class="font-bold text-xl mb-6">
        👤 Candidate Profile
    </h2>

    <div class="space-y-5">

        <div>
            <p class="text-gray-500">
                Name
            </p>

            <h3 class="font-semibold">
                {{ $application->candidate->name }}
            </h3>

        </div>

        <div>

            <p class="text-gray-500">
                Email
            </p>

            <h3 class="font-semibold">
                {{ $application->candidate->email }}
            </h3>

        </div>

        <div>

            <p class="text-gray-500">
                Education
            </p>

            <h3 class="font-semibold">
                {{ $application->candidate->candidateProfile->education ?? '-' }}
            </h3>

        </div>

        <div>

            <p class="text-gray-500">
                Experience
            </p>

            <h3 class="font-semibold">
                {{ $application->candidate->candidateProfile->experience_years ?? 0 }}
                Years
            </h3>

        </div>

    </div>

</div>
