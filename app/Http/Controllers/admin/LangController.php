<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LangController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$langs = Lang::get(['id', 'name']);

		return view('admin.langs.index', get_defined_vars());
	}

	public function create()
	{
		return view('admin.langs.create');
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
					'name' => ['required', 'unique:langs,name'],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$lang = Lang::create($validator->validated());
			return redirect()->back()->with('success', 'Lang Created Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	public function edit(Request $request, Lang $lang)
	{
		return view('admin.langs.edit', get_defined_vars());
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
					'name' => ['required', 'unique:langs,name,' . $id],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$lang = Lang::findOrFail($id);
			$lang->update($request->only('name'));
			return redirect()->back()->with('success', 'Lang Updated Successfully');
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
			$lang = Lang::findOrFail($id);
			$lang->delete();
			return redirect()->back()->with('success', 'Lang Deleted Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}
}
