<div class="bg-white rounded-2xl shadow p-6">

    <h2 class="font-bold text-xl mb-5">
        Recruiter Actions
    </h2>

    <div class="space-y-3">

        <button class="w-full bg-green-600 hover:bg-green-700 text-white py-3 rounded-xl">
            ✅ Shortlist Candidate
        </button>

        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl">
            📅 Schedule Interview
        </button>

        <button class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl">
            ❌ Reject Candidate
        </button>

        <a href="{{ route('recruiter.applications.resume', $application) }}"
            class="block w-full text-center bg-gray-800 hover:bg-gray-900 text-white py-3 rounded-xl">
            📄 View Resume
        </a>

    </div>

</div>
