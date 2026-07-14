<?php

namespace App\Services\AI;

use App\Models\Resume;

class ResumeAnalysisService
{
    public function analyze(Resume $resume)
    {
        return [
            'skills'=>[
                'Laravel','PHP','MySQL'
            ],
            'experience'=>2
        ];
    }
}
