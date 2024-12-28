<?php

namespace App\Http\Controllers\admin;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Validator;
class JobApplicationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$jobApplications = request()->has('limit') ?
			JobApplication::paginate(request()->get('limit') ?? 10) :
			JobApplication::all();

		$jobsCount = JobApplication::all()->count();
		$jobsPendingCount = JobApplication::where('status', 'pending')->count();
		$jobsAcceptedCount = JobApplication::where('status', 'accepted')->count();
		$jobsRejectedCount = JobApplication::where('status', 'rejected')->count();

		return view('admin.jobApplications.index', get_defined_vars());
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		try {
			$jobApplication = JobApplication::findOrFail($id);
			$jobApplication->Load(['doctor', 'jobAdd']);
			return view('admin.jobApplications.show', get_defined_vars());
		} catch (Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}



	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, JobApplication $jobApplication)
	{
		// update job application status
		try {
			$validator = Validator::make(
				$request->all(),
				[
					'status' => ['required'],
				]
			);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator->errors());
			}

			$jobApplication->status = $request->status;
			$jobApplication->save();
			return redirect()->back()->with('success', 'Job Application Status Updated Successfully');

		} catch (Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}
}
