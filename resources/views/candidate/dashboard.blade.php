@extends('layouts.candidate')

@section('content')
    <h1 class="text-3xl font-bold">
        Welcome Candidate
    </h1>

    <div class="grid md:grid-cols-3 gap-6 mt-8">
        <div class="bg-white p-6 rounded-2xl shadow">
            <h2 class="text-xl font-bold">
                Available Jobs
            </h2>

            <p class="text-3xl mt-3">

                {{ $jobCount ?? 0 }}

            </p>

        </div>

        <div class="bg-white p-6 rounded-2xl shadow">

            <h2 class="text-xl font-bold">

                Applications

            </h2>

            <p class="text-3xl mt-3">

                {{ $applicationCount ?? 0 }}

            </p>

        </div>

        <div class="bg-white p-6 rounded-2xl shadow">

            <h2 class="text-xl font-bold">

                AI Profile Score

            </h2>

            <p class="text-3xl mt-3">

                -

            </p>

        </div>

    </div>
@endsection
