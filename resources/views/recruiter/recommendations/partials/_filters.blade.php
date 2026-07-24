<form method="GET">

    <div class="bg-white rounded-xl shadow p-5">

        <div class="grid md:grid-cols-3 gap-4">

            <input type="search" name="search" value="{{ request('search') }}" placeholder="🔍 Search Candidate"
                class="border rounded-xl px-4 py-3">

            <select name="filter" class="border rounded-xl px-4 py-3">

                <option value="">All Matches</option>

                <option value="high" @selected(request('filter') == 'high')>
                    High Match
                </option>

                <option value="medium" @selected(request('filter') == 'medium')>
                    Medium Match
                </option>

                <option value="low" @selected(request('filter') == 'low')>
                    Low Match
                </option>

            </select>

            <select name="sort" class="border rounded-xl px-4 py-3">

                <option value="highest" @selected(request('sort') == 'highest')>
                    Highest Score
                </option>

                <option value="lowest" @selected(request('sort') == 'lowest')>
                    Lowest Score
                </option>

                <option value="latest" @selected(request('sort') == 'latest')>
                    Latest
                </option>

            </select>

        </div>

        <div class="mt-5 flex gap-3">

            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl">
                Apply
            </button>

            <a href="{{ route('recruiter.recommendations.index', $jobPost) }}"
                class="bg-gray-200 hover:bg-gray-300 px-6 py-3 rounded-xl">
                Reset
            </a>

        </div>

    </div>

</form>
