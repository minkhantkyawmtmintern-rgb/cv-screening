<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'department',
        'description',
        'experience_level',
        'minimum_experience',
        'location',
        'is_active',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function skills()
    {
        return $this->belongsToMany(
            Skill::class,
            'job_post_skill'
        )
            ->withPivot('importance')
            ->withTimestamps();
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function highMatchedApplications()
    {
        return $this->hasMany(Application::class)
            ->where('match_score', '>=', 80);
    }
}
