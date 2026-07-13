<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_post_id',
        'candidate_id',
        'resume_id',
        'match_score',
        'ai_feedback',
        'cover_letter'
    ];

    protected $casts = [
        'ai_feedback'=>'array',
    ];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function candidate()
    {
        return $this->belongsTo(User::class,'candidate_id');
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }
}
