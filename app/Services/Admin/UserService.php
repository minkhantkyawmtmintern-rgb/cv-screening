<?php

namespace App\Services\Admin;

use App\Models\User;

class UserService
{
    public function getUsers(?string $search = null, ?string $role = null)
    {
        return User::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'ILIKE', "%{$search}%")
                      ->orWhere('email', 'ILIKE', "%{$search}%");
                });
            })
            ->when($role, function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }

    public function toggleStatus(User $user)
    {
        $user->update([
            'is_active' => !$user->is_active
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();
    }
}