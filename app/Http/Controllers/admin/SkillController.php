<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$skills = Skill::get(['id', 'name']);

		return view('admin.skills.index', get_defined_vars());
	}

	public function create()
	{
		return view('admin.skills.create');
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
					'name' => ['required', 'unique:skills,name'],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$skill = Skill::create($validator->validated());
			return redirect()->back()->with('success', 'Skill Created Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	public function edit(Request $request, Skill $skill)
	{
		return view('admin.skills.edit', get_defined_vars());
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
					'name' => ['required', 'unique:skills,name,' . $id],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$skill = Skill::findOrFail($id);
			$skill->update($request->only('name'));
			return redirect()->back()->with('success', 'Skill Updated Successfully');
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
			$skill = Skill::findOrFail($id);
			$skill->delete();
			return redirect()->back()->with('success', 'Skill Deleted Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}
}
