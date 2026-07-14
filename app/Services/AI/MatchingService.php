<?php

namespace App\Services\AI;

class MatchingService
{
    public function calculate( array $resumeData,array $jobData)
    {
       $resumeSkills = $resumeData['skills'];
       $jobSkills = $jobData['skills'];

       $matched = count(
        array_intersect($resumeSkills,$jobSkills)
       );

       $total = count($jobSkills);
       $score = 0;

       if($total > 0){
        $score = ($matched/$total)*100;
       }
       return [
        'score'=>round($score),
        'feedback'=>[
            'matched_skills'=>array_intersect($resumeSkills,$jobSkills),
            'missing_skills'=>array_diff($jobSkills,$resumeSkills)
        ]
       ];
    }
}
