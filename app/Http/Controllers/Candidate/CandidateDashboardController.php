<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Services\Candidate\CandidateDashboardService;
use Illuminate\Support\Facades\Auth;

class CandidateDashboardController extends Controller
{
    public function __construct(private CandidateDashboardService $service)
    { }
    public function index()
    {
        $data = $this->service->getDashboardData(Auth::id());
        return view(
            'candidate.dashboard',$data
        );
    }

}
