<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Services\Admin\ApplicationService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct(private ApplicationService $service){}

    public function index()
    {
        $applications = $this->service->getAllApplications();
        return view('admin.applications.index',compact('applications'));
    }

    public function show(Application $application)
    {
        $application = $this->service->getApplicationDetail($application);
        return view('admin.applications.show',compact('application'));
    }
}
