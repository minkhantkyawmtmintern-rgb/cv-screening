<?php

use App\Http\Controllers\Candidate\JobController;
use App\Http\Controllers\Candidate\ProfileController;
use App\Http\Controllers\Candidate\ResumeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Recruiter\JobPostController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth')->name('dashboard');

Route::middleware([
    'auth',
    'role:candidate'
])
    ->prefix('candidate')
    ->group(function () {

        Route::get('/dashboard',function(){
            return view('candidate.dashboard');
        })->name('candidate.dashboard');

        Route::get('/profile',[ProfileController::class,'show'])->name('candidate.profile.show');
        Route::get('/profile/create',[ProfileController::class,'create'])->name('candidate.profile.create');
        Route::post('/profile',[ProfileController::class,'store'])->name('candidate.profile.store');
        Route::get('/profile/edit',[ProfileController::class,'edit'])->name('candidate.profile.edit');
        Route::put('/profile',[ProfileController::class,'update'])->name('candidate.profile.update');

        Route::get('/resumes', [ResumeController::class, 'index'])->name('candidate.resumes.index');
        Route::get('/resumes/create', [ResumeController::class, 'create'])->name('candidate.resumes.create');
        Route::post('/resumes', [ResumeController::class, 'store'])->name('candidate.resumes.store');
        Route::delete('/resumes/{resume}',[ResumeController::class,'destroy'])->name('candidate.resumes.destroy');

        Route::get('/jobs',[JobController::class,'index'])->name('candidate.jobs.index');
        Route::get('/jobs/{jobPost}',[JobController::class,'show'])->name('candidate.jobs.show');

    });

Route::resource('job-posts', JobPostController::class);

require __DIR__ . '/auth.php';
