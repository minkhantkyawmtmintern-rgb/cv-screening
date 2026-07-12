<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    protected $fillable = [

        'user_id',
        'phone',
        'date_of_birth',
        'gender',
        'address',
        'education',
        'university',
        'major',
        'experience_years',
        'linkedin_url',
        'portfolio_url',
        'summary',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
