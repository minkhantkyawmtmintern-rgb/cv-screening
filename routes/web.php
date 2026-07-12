<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Candidate\ResumeController;
use App\Http\Controllers\Recruiter\JobPostController;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth',
    'role:candidate'
])
    ->prefix('candidate')
    ->group(function () {
        Route::get('/resumes', [ResumeController::class, 'index'])->name('candidate.resumes.index');
        Route::get('/resumes/create', [ResumeController::class, 'create'])->name('candidate.resumes.create');
        Route::post('/resumes', [ResumeController::class, 'store'])->name('candidate.resumes.store');
        Route::delete('/resumes/{resume}',[ResumeController::class,'destroy'])->name('candidate.resumes.destroy');
    });

Route::resource('job-posts', JobPostController::class);

require __DIR__ . '/auth.php';
