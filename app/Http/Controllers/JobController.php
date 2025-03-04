<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(2);
        return view('jobs.index', [
            'heading' => 'Jobs Page',
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', [  'job' => $job]);
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min: 3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);


        return redirect('/jobs');

    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect('/jobs');
    }

    public function update(Job $job)
    {
        request()->validate([
            'title' => ['required', 'min: 3'],
            'salary' => ['required']
        ]);
        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);
        return redirect('/jobs/'.$job->id);
    }
}
