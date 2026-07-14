<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\Recruiter\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct(private ApplicationService $service)
    { }

    public function index()
    {
        return view('recruiter.applications.index',compact('applications'));
    }

    public function show(Application $application)
    {
        $application = $this->service->getApplication(($application));
        return view('recruiter.applications.show',compact('application'));
    }

    
}
