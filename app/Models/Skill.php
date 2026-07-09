<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
    ];

    public function jobPosts()
    {
        return $this->belongsToMany(
            JobPost::class,
            'job_post_skill'
        )
            ->withPivot('importance')
            ->withTimestamps();
    }
}
