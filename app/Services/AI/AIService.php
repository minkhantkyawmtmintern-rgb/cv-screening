<?php

namespace App\Services\AI;

use Illuminate\Support\Facades\Http;

class AIService
{
   
    public function analyze(array $data)
    {
        $response = Http::post(
            config('services.ai.url').'/analyze',$data
        );
        if($response->failed())
        {
            throw new \Exception('AI service failed.');
        }
        return $response->json();
    }
}
