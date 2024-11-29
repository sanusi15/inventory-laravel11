<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('job.index')->with([
            'page_title' => 'List of Job',
            'jobs' => Job::all(),
            'custom_js' => 'job.js'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_number' => ['required'],
            'job_name' => ['required'],
            'job_status' => ['required'],
        ]);
        $data = [
            'job_no' => $request->job_number,
            'job_name' => $request->job_name,
            'job_status' => $request->job_status,
        ];
        Job::create($data);
        return redirect()->route('jobs')->with([
            'status_message' => 'success',
            'value_message' => 'Job has been created',
        ]);
    }

    public function show(Job $job)
    {
        return response()->json($job);        
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'job_number' => ['required'],
            'job_name' => ['required'],
            'job_status' => ['required'],
        ]);
        $data = [
            'job_no' => $request->job_number,
            'job_name' => $request->job_name,
            'job_status' => $request->job_status,
        ];
        $job->update($data);
        return redirect()->route('jobs')->with([
            'status_message' => 'success',
            'value_message' => 'Job has been updated'
        ]);     
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs')->with(
            [
                'status_message' => 'success',
                'value_message' => 'Job deleted'
            ]
        );        
    }
}
