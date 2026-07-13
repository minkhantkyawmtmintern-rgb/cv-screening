<?php

namespace App\Services;

use App\Models\CandidateProfile;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CandidateProfileService
{
    public function create(
        User $user,
        array $data
    ) {
        return DB::transaction(function () use ($user, $data) {
            return CandidateProfile::create([
                'user_id' => $user->id,
                ...$data
            ]);
        });
    }

    public function update(
        CandidateProfile $profile,
        array $data
    ) {
        return DB::transaction(function () use ($profile, $data) {
            $profile->update($data);
            return $profile;
        });
    }
}
