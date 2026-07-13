<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return match($user->role)
        {

            'candidate' =>
                redirect()->route('candidate.dashboard'),

            'recruiter' =>
                redirect()->route('recruiter.dashboard'),


            'admin' =>
                redirect()->route('admin.dashboard'),

        };

    }
}
