<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Homepage
Route::get('/', function () {
    return view('home');
});

// ------------------ Jobs CRUD ------------------

// Resourceful route for jobs
Route::resource('jobs', JobController::class);
