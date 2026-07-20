@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-8">

        Admin Dashboard

    </h1>

    <div class="grid grid-cols-3 gap-6">

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-gray-500">

                Candidates

            </h3>

            <p class="text-4xl font-bold mt-3">

                {{ $stats['candidates'] }}

            </p>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-gray-500">

                Recruiters

            </h3>

            <p class="text-4xl font-bold mt-3">

                {{ $stats['recruiters'] }}

            </p>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-gray-500">

                Jobs

            </h3>

            <p class="text-4xl font-bold mt-3">

                {{ $stats['jobs'] }}

            </p>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-gray-500">

                Applications

            </h3>

            <p class="text-4xl font-bold mt-3">

                {{ $stats['applications'] }}

            </p>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-gray-500">

                AI Reports

            </h3>

            <p class="text-4xl font-bold mt-3">

                {{ $stats['ai_reports'] }}

            </p>

        </div>

        <div class="bg-white rounded-xl shadow p-6">

            <h3 class="text-gray-500">

                Average AI Score

            </h3>

            <p class="text-4xl font-bold mt-3 text-indigo-600">

                {{ $stats['average_score'] }}%

            </p>

        </div>

    </div>
@endsection
