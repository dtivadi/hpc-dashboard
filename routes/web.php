
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/jobs', function () {
    return view('jobs');
});

Route::get('/billing', function () {
    return view('billing');
});