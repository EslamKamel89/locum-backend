<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobInfoController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$jobInfos = JobInfo::select('id', 'name')->get();
		return view('admin.job_infos.index', get_defined_vars());
	}

	public function create()
	{
		return view('admin.job_infos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		try {
			$validator = Validator::make(
				$request->all(),
				[
					'name' => ['required'],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$jobInfo = JobInfo::create($validator->validated());
			return redirect()->back()->with('success', 'Resource Created Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	public function edit(Request $request, JobInfo $jobInfo)
	{
		return view('admin.job_infos.edit', get_defined_vars());
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		try {
			$validator = Validator::make(
				$request->all(),
				[
					'name' => ['required'],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$jobInfo = JobInfo::findOrFail($id);
			$jobInfo->update($request->only('name'));
			return redirect()->back()->with('success', 'Resource Updated Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		try {
			$jobInfo = JobInfo::findOrFail($id);
			$jobInfo->delete();
			return redirect()->back()->with('success', 'Resource Deleted Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}
}
