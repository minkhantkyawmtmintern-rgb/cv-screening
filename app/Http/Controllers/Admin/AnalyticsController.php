<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AnalyticsService;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function __construct(private AnalyticsService $service){}

    public function index()
    {
        $overview = $this->service->getOverview();
        $topCandidates = $this->service->getTopCandidates();
        $skills = $this->service->getSkillStatistics();
        return view('admin.analytics.index',compact('overview','topCandidates','skills'));
    }
}
