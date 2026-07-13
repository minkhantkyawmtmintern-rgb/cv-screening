<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id',
        'file_name',
        'file_path',
        'file_type',
        'extracted_text',
        'ai_analysis'
    ];

    protected $casts = [
        'ai_analysis' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
