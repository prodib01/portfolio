<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Regular resource routes
Route::resource('projects', ProjectController::class);
Route::resource('skills', SkillController::class);
Route::resource('experiences', ExperienceController::class);
Route::resource('educations', EducationController::class);
Route::resource('resumes', ResumeController::class);

// Contact routes
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contacts/send', [ContactController::class, 'send'])->name('contacts.send');

// Resume routes
Route::get('/resume', [ResumeController::class, 'index'])->name('resume');
Route::get('/download-resume', [ResumeController::class, 'downloadResume'])->name('download.resume');

// Dashboard & About routes
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/picture', [ProfileController::class, 'updateProfilePicture'])
        ->name('profile.picture.update');
});

require __DIR__.'/auth.php';
