<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\RecruiterController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Candidate\JobController;
use App\Http\Controllers\Candidate\ProfileController;
use App\Http\Controllers\Candidate\ResumeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Candidate\CandidateDashboardController;
use App\Http\Controllers\Recruiter\JobPostController;
use App\Http\Controllers\Candidate\ApplicationController;
use App\Http\Controllers\Recruiter\RecommendationController;
use App\Http\Controllers\Recruiter\RecruiterDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware([
    'auth',
    'role:candidate'
])
    ->prefix('candidate')
    ->group(function () {

        Route::get('/dashboard', [CandidateDashboardController::class, 'index'])->name('candidate.dashboard');

        Route::get('/profile', [ProfileController::class, 'show'])->name('candidate.profile.show');
        Route::get('/profile/create', [ProfileController::class, 'create'])->name('candidate.profile.create');
        Route::post('/profile', [ProfileController::class, 'store'])->name('candidate.profile.store');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('candidate.profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('candidate.profile.update');

        Route::get('/resumes', [ResumeController::class, 'index'])->name('candidate.resumes.index');
        Route::get('/resumes/create', [ResumeController::class, 'create'])->name('candidate.resumes.create');
        Route::post('/resumes', [ResumeController::class, 'store'])->name('candidate.resumes.store');
        Route::delete('/resumes/{resume}', [ResumeController::class, 'destroy'])->name('candidate.resumes.destroy');

        Route::get('/jobs', [JobController::class, 'index'])->name('candidate.jobs.index');
        Route::get('/jobs/{jobPost}', [JobController::class, 'show'])->name('candidate.jobs.show');
        Route::get('/jobs/{jobPost}/apply', [ApplicationController::class, 'create'])->name('candidate.jobs.apply.create');
        Route::post('/jobs/{jobPost}/apply', [ApplicationController::class, 'store'])->name('candidate.jobs.apply');

        Route::get('/applications', [ApplicationController::class, 'index'])->name('candidate.applications.index');
    });

Route::middleware([
    'auth',
    'role:recruiter',
])
    ->prefix('recruiter')
    ->group(function () {
        Route::get('/dashboard', [RecruiterDashboardController::class, 'index'])->name('recruiter.dashboard');
        Route::get('/applications', [\App\Http\Controllers\Recruiter\ApplicationController::class, 'index'])
            ->name('recruiter.applications.index');
        Route::get('/applications/{application}', [\App\Http\Controllers\Recruiter\ApplicationController::class, 'show'])
            ->name('recruiter.applications.show');

        Route::get('/applications/{application}/ai-report', [RecommendationController::class, 'show'])
            ->name('recruiter.recommendations.show');

        Route::get('/job-posts/{jobPost}/recommendations', [RecommendationController::class, 'index'])
            ->name('recruiter.recommendations.index');

        Route::post('/job-posts/{jobPost}/recommendations/generate', [RecommendationController::class, 'generate'])
            ->name('recruiter.recommendations.generate');

        Route::get('/applications/{application}/resume', [\App\Http\Controllers\Recruiter\ResumeController::class, 'view'])
            ->name('recruiter.applications.resume');

        Route::resource('job-posts', JobPostController::class);
    });

Route::middleware([
    'auth',
    'role:admin'
])->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

       Route::get('/users',[UserController::class,'index'])->name('users.index');
       Route::patch('/users/{user}/toggle',[UserController::class,'toggleStatus'])->name('users.toggle');
       Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');

       Route::get('/analytics',[AnalyticsController::class,'index'])->name('analytics.index');

       Route::get('/jobs',[App\Http\Controllers\Admin\JobController::class,'index'])->name('jobs.index');
       Route::get('/jobs/{jobPost}',[App\Http\Controllers\Admin\JobController::class,'show'])->name('jobs.show');
       Route::delete('/jobs/{jobPost}',[App\Http\Controllers\Admin\JobController::class,'destroy'])->name('jobs.destroy');

       Route::get('/applications',[App\Http\Controllers\Admin\ApplicationController::class,'index'])->name('applications.index');
       Route::get('/applications/{application}',[App\Http\Controllers\Admin\ApplicationController::class,'show'])->name('applications.show');
       
       Route::resource('recruiters', RecruiterController::class);
       Route::resource('skills',SkillController::class);
    });



require __DIR__ . '/auth.php';
