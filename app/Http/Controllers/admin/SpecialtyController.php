<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialtyController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$specialties = Specialty::get(['id', 'name']);

		return view('admin.specialties.index', get_defined_vars());
	}

	public function create()
	{
		return view('admin.specialties.create');
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
					'name' => ['required', 'unique:specialties,name'],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$specialty = Specialty::create($validator->validated());
			return redirect()->back()->with('success', 'Specialty Created Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	public function edit(Request $request, Specialty $specialty)
	{
		return view('admin.specialties.edit', get_defined_vars());
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
					'name' => ['required', 'unique:specialties,name,' . $id],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$specialty = Specialty::findOrFail($id);
			$specialty->update($request->only('name'));
			return redirect()->back()->with('success', 'Specialty Updated Successfully');
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
			$specialty = Specialty::findOrFail($id);
			$specialty->delete();
			return redirect()->back()->with('success', 'Specialty Deleted Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}
}
