<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$states = State::get(['id', 'name']);

		return view('admin.states.index', get_defined_vars());
	}

	public function create()
	{
		return view('admin.states.create');
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
					'name' => ['required', 'unique:states,name'],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$state = State::create($validator->validated());
			return redirect()->back()->with('success', 'State Created Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	public function edit(Request $request, State $state)
	{
		return view('admin.states.edit', get_defined_vars());
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
					'name' => ['required', 'unique:states,name,' . $id],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$state = State::findOrFail($id);
			$state->update($request->only('name'));
			return redirect()->back()->with('success', 'State Updated Successfully');
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
			$state = State::findOrFail($id);
			$state->delete();
			return redirect()->back()->with('success', 'State Deleted Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}
}
