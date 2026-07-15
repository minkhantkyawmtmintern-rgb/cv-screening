<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function view(Application $application)
    {
        if(!$application->resume){
            abort(404);
        }
        return Storage::disk('public')
                ->response($application->resume->file_path);
    }
}
