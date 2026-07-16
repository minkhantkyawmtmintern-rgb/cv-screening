<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;

class AIService
{
   
    public function analyze(array $data)
    {
        $response = Http::timeout(60)->post(
            config('services.ai.url').'/analyze',$data
        );
        if($response->failed())
        {
            throw new \Exception('AI service connection failed.');
        }
        return $response->json();
    }
}
