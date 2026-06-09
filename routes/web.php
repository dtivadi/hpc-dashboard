<?php
use Illuminate\Support\Facades\Route;

// Dashboard page (homepage)
Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Your sidebar pages
Route::get('/billing', function () {
    return view('billing');
});

Route::get('/reports', function () {
    return view('reports');
});

Route::get('/settings', function () {
    return view('settings');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/jobs', function () {
    return view('jobs');

});
Route::get('/reports', function () {
    return view('reports');
});