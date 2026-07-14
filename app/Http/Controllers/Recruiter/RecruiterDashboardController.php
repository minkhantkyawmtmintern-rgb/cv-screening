<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Services\Recruiter\RecruiterDashboardService;
use Illuminate\Http\Request;

class RecruiterDashboardController extends Controller
{
    public function __construct(private RecruiterDashboardService $service)
    { }

    public function index()
    {
        $data = $this->service->getDashboardData();
        return view('recruiter.dashboard',$data);
    }
}
