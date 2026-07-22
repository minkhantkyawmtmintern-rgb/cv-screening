<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RecruiterService
{
    public function index(?string $search = null)
    {
        return User::where('role', 'recruiter')->withCount('jobPosts')

            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('name', 'ILIKE', "%{$search}%")
                        ->orWhere('email', 'ILIKE', "%{$search}%");
                });
            })

            ->latest()

            ->paginate(10)

            ->withQueryString();
    }

    public function statistics()
    {
        return [

            'total' => User::where('role', 'recruiter')->count(),

            'jobs' => \App\Models\JobPost::count(),

            'applications' => \App\Models\Application::count(),

        ];
    }

    public function store(array $data)
    {
        return User::create([

            'name' => $data['name'],

            'email' => $data['email'],

            'password' => Hash::make($data['password']),

            'role' => 'recruiter',

        ]);
    }

    public function show(User $recruiter)
    {
        return $recruiter->loadCount('jobPosts')
            ->load([
                'jobPosts' => function ($query) {
                    $query->latest()->take(5);
                }
            ]);
    }

    public function update(User $user, array $data)
    {
        $payload = [

            'name' => $data['name'],

            'email' => $data['email'],

        ];

        if (!empty($data['password'])) {

            $payload['password'] = Hash::make($data['password']);
        }

        $user->update($payload);

        return $user;
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}
