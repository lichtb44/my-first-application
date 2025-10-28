<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Homepage
Route::get('/', function () {
    return view('home');
});

// ------------------ Jobs CRUD ------------------

// Show all jobs
Route::get('/jobs', function () {
    return view('jobs.index', [
        'jobs' => Job::with('employer')->paginate(10)
    ]);
})->name('jobs.index'); // Added route name for easy linking

// Show the create job form
Route::get('/jobs/create', function () {
    return view('jobs.create');
})->name('jobs.create');

// Store a new job with validation
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1 // Hardcoded for now
    ]);

    return redirect()->route('jobs.index'); // Use named route
})->name('jobs.store');

// Show a single job
Route::get('/jobs/{job}', function (Job $job) {
    return view('jobs.show', ['job' => $job]);
})->name('jobs.show');

// Show the edit job form
Route::get('/jobs/{job}/edit', function (Job $job) {
    return view('jobs.edit', ['job' => $job]);
})->name('jobs.edit');

// Update a job
Route::patch('/jobs/{job}', function (Job $job) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary')
    ]);

    return redirect()->route('jobs.show', $job->id);
})->name('jobs.update');

// Delete a job
Route::delete('/jobs/{job}', function (Job $job) {
    $job->delete();
    return redirect()->route('jobs.index');
})->name('jobs.destroy');
