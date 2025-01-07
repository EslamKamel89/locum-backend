<?php

namespace App\Http\Controllers\healthcare;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobAdd;

class HealthcareAddsController extends Controller
{

    public function store(Request $request)
    {
        try {
            JobAdd::create([
                'title' => $request->title ?? null,
                'hospital_id' => auth()->user()->hospital->id ?? null,
                'speciality_id' => $request->speciality_id ?? null,
                'job_info_id' => $request->job_info_id ?? null,
                'job_type' => $request->job_type ?? null,
                'location' => $request->location ?? null,
                'description' => $request->description ?? null,
                'responsibilities' => $request->responsibilities ?? null,
                'qualifications' => $request->qualifications ?? null,
                'experience_required' => $request->experience_required ?? null,
                'salary_min' => $request->salary_min ?? null,
                'salary_max' => $request->salary_max ?? null,
            ]);
            return redirect()->back()->with('success', 'Adds added successfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $jobAdd = JobAdd::findOrFail($id);
            $jobAdd->update($request->all());
            return redirect()->back()->with('success', 'Adds updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
