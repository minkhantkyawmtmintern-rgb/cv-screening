<div class="bg-white rounded-2xl shadow p-8">

    <h2 class="text-2xl font-bold mb-6">
        AI Requirement Profile
    </h2>

    <div class="space-y-5">

        @foreach ($jobPost->skills as $skill)
            <div class="flex justify-between items-center border-b pb-4">

                <div>
                    <h4 class="font-semibold">
                        {{ $skill->name }}
                    </h4>
                </div>

                <div>

                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $skill->pivot->importance)
                            ⭐
                        @else
                            ☆
                        @endif
                    @endfor

                </div>

            </div>
        @endforeach

    </div>

</div>
