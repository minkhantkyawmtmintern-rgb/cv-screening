<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminDashboardService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct(private AdminDashboardService $service){}

    public function index()
    {
        $stats = $this->service->getStatistics();
        return view('admin.dashboard',compact('stats'));
    }
}
