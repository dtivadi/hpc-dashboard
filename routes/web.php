<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/billing', function () {
        return view('billing');
    })->name('billing');

    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::resource('users', UserController::class);
    Route::resource('resources', ResourceController::class);
    Route::resource('services', ServiceController::class);

    Route::get('/jobs', [\App\Http\Controllers\JobController::class, 'index'])->name('jobs');
});
