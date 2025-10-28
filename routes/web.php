<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Homepage
Route::get('/', function () {
    return view('home');
});

// All Jobs Page with Eager Loading and Pagination
Route::get('/jobs', function () {
    // Fetch 10 jobs per page along with their employers
    return view('jobs', [
        'jobs' => Job::with('employer')->paginate(10)
    ]);
})->name('jobs.index');

// Single Job Page
Route::get('/jobs/{id}', function ($id) {
    // Eager load employer for a single job
    return view('job', [
        'job' => Job::with('employer')->find($id)
    ]);
})->name('jobs.show');
