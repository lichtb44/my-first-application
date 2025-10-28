<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Show all jobs
    public function index()
    {
        $jobs = Job::with('employer')->paginate(10);
        return view('jobs.index', ['jobs' => $jobs]);
    }

    // Show the create job form
    public function create()
    {
        return view('jobs.create');
    }

    // Store a new job with validation
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => $request->title,
            'salary' => $request->salary,
            'employer_id' => 1 // Hardcoded for now
        ]);

        return redirect()->route('jobs.index');
    }

    // Show a single job
    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    // Show the edit job form
    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    // Update a job
    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title' => $request->title,
            'salary' => $request->salary
        ]);

        return redirect()->route('jobs.show', $job->id);
    }

    // Delete a job
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
}
