<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DistrictController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index(Request $request)
	{
		try {
			$districts = District::with('state')->get();
			return view('admin.districts.index', get_defined_vars());
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	public function create()
	{
		try {
			$states = State::all();
			return view('admin.districts.create', get_defined_vars());
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
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
					'state_id' => ['required', Rule::exists('states', 'id')],
					'name' => ['required'],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$district = District::create($validator->validated());
			return redirect()->back()->with('success', 'District Created Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		try {
			$district = District::findOrFail($id)->load('state');
			return $this->success(
				$district
			);
		} catch (\Exception $e) {
			return $this->handleException($e);
		}
	}

	public function edit(District $district)
	{
		try {
			$states = State::all();
			return view('admin.districts.edit', get_defined_vars());
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
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
					'name' => 'required|unique:districts,name,' . $id,
					'state_id' => ['required', Rule::exists('states', 'id')],
				]
			);
			if ($validator->fails()) {
				return $this->handleValidation($validator);
			}

			$district = District::findOrFail($id);

			$district->update($request->only('name', 'state_id'));
			return redirect()->back()->with('success', 'District Updated Successfully');
		} catch (\Exception $e) {
			return $this->handleException($e);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		try {
			$district = District::findOrFail($id);
			$district->delete();
			return redirect()->back()->with('success', 'District Deleted Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}
}
