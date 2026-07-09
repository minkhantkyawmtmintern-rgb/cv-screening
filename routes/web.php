<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Recruiter\JobPostController;
use Illuminate\Support\Facades\Route;


    Route::resource('job-posts', JobPostController::class);


require __DIR__.'/auth.php';
