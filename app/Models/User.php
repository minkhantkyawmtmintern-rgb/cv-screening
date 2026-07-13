<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Resume;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'role'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isRecruiter()
    {
        return $this->role === 'recruiter';
    }

    public function isCandidate()
    {
        return $this->role === 'candidate';
    }

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'created_by');
    }

    public function candidateProfile()
    {
        return $this->hasOne(
            CandidateProfile::class
        );
    }

    public function resumes()
    {
        return $this->hasMany(
            Resume::class
        );
    }

    public function applications()
    {
        return $this->hasMany(Application::class,'candidate_id');
    }
}
