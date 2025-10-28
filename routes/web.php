<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Homepage
Route::get('/', function () {
    return view('home');
});

// All Jobs Page
Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
})->name('jobs.index');

// Single Job Page
Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => Job::find($id)
    ]);
})->name('jobs.show');
