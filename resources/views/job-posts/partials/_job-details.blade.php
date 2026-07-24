<div class="bg-white rounded-2xl shadow p-8">

    <h2 class="text-2xl font-bold mb-6">
        Job Details
    </h2>

    <p class="leading-8 text-gray-600">
        {{ $jobPost->description }}
    </p>

    <div class="grid md:grid-cols-3 gap-6 mt-8">

        <div class="bg-gray-50 rounded-xl p-5">

            <p class="text-gray-500">
                Experience Level
            </p>

            <h3 class="font-bold mt-2">
                {{ ucfirst($jobPost->experience_level) }}
            </h3>

        </div>

        <div class="bg-gray-50 rounded-xl p-5">

            <p class="text-gray-500">
                Minimum Experience
            </p>

            <h3 class="font-bold mt-2">
                {{ $jobPost->minimum_experience ?? 0 }}
                Years
            </h3>

        </div>

        <div class="bg-gray-50 rounded-xl p-5">

            <p class="text-gray-500">
                Location
            </p>

            <h3 class="font-bold mt-2">
                {{ $jobPost->location }}
            </h3>

        </div>

    </div>

</div>
