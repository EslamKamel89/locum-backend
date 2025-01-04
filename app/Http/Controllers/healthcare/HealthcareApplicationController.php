<?php

namespace App\Http\Controllers\healthcare;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;

class HealthcareApplicationController extends Controller
{
    public function index()
    {
        $jobApplications = JobApplication::all();
        return view('healthcare.jobApplications.index', get_defined_vars());
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'job_id' => 'required|integer',
                'user_id' => 'required|integer',
                'status' => 'required|in:pending,approved,rejected',
            ]);

            $application = JobApplication::create($request->all());

            return redirect()->back()->with('success', 'Job Application Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function show(JobApplication $application)
    {
        return view('healthcare.jobApplications.show', get_defined_vars());
    }

    public function update(Request $request, JobApplication $application)
    {
        try {
            $request->validate([
                'job_id' => 'required|integer',
                'user_id' => 'required|integer',
                'status' => 'required|in:pending,approved,rejected',
            ]);

            $application->update($request->all());

            return redirect()->back()->with('success', 'Job Application Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function destroy(JobApplication $application)
    {
        try {
            $application->delete();
            return redirect()->back()->with('success', 'Job Application Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
