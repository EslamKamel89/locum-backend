<?php

namespace App\Http\Controllers\admin;

use App\Models\Lang;
use App\Models\User;
use App\Enums\Gender;
use App\Models\Skill;
use App\Models\State;
use App\Enums\UserType;
use App\Models\JobInfo;
use App\Models\District;
use App\Models\Hospital;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Enums\shiftPreference;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\File;
use App\Http\Resources\HospitalResource;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$hospitals = request()->has('limit') ?
			Hospital::latest()->paginate(request()->get('limit') ?? 10) :
			Hospital::latest()->get();

		$hospitals = HospitalResource::collection($hospitals);
		return view('admin.hospitals.index', get_defined_vars());
	}

	public function create()
	{
		try {
			$specialties = Specialty::all();
			$jobInfos = JobInfo::all();
			$langs = Lang::all();
			$skills = Skill::all();
			$states = State::all();
			$districts = District::all();
			$genders = Gender::cases();
			$shiftPreferences = shiftPreference::cases();

			return view('admin.hospitals.create', get_defined_vars());
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
					'facility_name' => ['required'],
					'type' => ['required'],
					'contact_person' => ['sometimes', 'nullable'],
					'contact_email' => ['sometimes', 'email', 'nullable'],
					'contact_phone' => ['sometimes', 'nullable'],
					'address' => ['sometimes', 'nullable', 'max:255'],
					'services_offered' => ['sometimes', 'nullable', 'max:255'],
					'number_of_beds' => ['sometimes', 'nullable', 'numeric'],
					'website_url' => ['sometimes', 'nullable'],
					'year_established' => ['sometimes', 'nullable', 'numeric'],
					'overview' => ['sometimes', 'nullable', 'max:255'],
					'photo' => [
						'sometimes',
						'nullable',
						'nullable',
						File::image()
						// ->min( 1024 )
						// ->max( 12 * 1024 )
					],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}
			$path = null;
			if ($request->hasFile('photo')) {
				$path = $request->file('photo')->store('hospital/facility_imgs', 'public');
				$path = "storage/$path";
			}
			$user = new User();
			$user->name = request()->input('name');
			$user->email = request()->input('email');
			$user->password = bcrypt(request()->input('password'));
			$user->state_id = request()->input('state_id');
			$user->district_id = request()->input('district_id');
			$user->type = UserType::hospital;
			$user->save();

			$hospital = new Hospital();
			$hospital->user_id = $user->id;
			$hospital->facility_name = request()->input('facility_name');
			$hospital->type = request()->input('type');
			$hospital->contact_person = request()->input('contact_person');
			$hospital->contact_email = request()->input('contact_email');
			$hospital->contact_phone = request()->input('contact_phone');
			$hospital->address = request()->input('address');
			$hospital->services_offered = request()->input('services_offered');
			$hospital->number_of_beds = request()->input('number_of_beds');
			$hospital->website_url = request()->input('website_url');
			$hospital->year_established = request()->input('year_established');
			$hospital->overview = request()->input('overview');
			$hospital->photo = $path;
			$hospital->save();

			return redirect()->back()->with('success', 'Hospital Created Successfully');
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
			$hospital = Hospital::findOrFail($id);
			$hospital->Load(['user', "hospitalInfo", "hospitalDocuments", "jobAdds"]);
			return $this->success(new HospitalResource($hospital));
		} catch (\Exception $e) {
			return $this->handleException($e);
		}
	}

	public function edit(string $id)
	{
		try {
			$hospital = Hospital::findOrFail($id);
			$specialties = Specialty::all();
			$jobInfos = JobInfo::all();
			$langs = Lang::all();
			$skills = Skill::all();
			$states = State::all();
			$districts = District::all();
			$genders = Gender::cases();
			$shiftPreferences = shiftPreference::cases();
			return view('admin.hospitals.edit', get_defined_vars());
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
			$hospital = Hospital::findOrFail($id);
			$user = $hospital->user;

			$validator = Validator::make(
				$request->all(),
				[
					'facility_name' => ['sometimes'],
					'type' => ['sometimes'],
					'contact_person' => ['sometimes'],
					'contact_email' => ['sometimes', 'email'],
					'contact_phone' => ['sometimes'],
					'address' => ['sometimes', 'max:255'],
					'services_offered' => ['sometimes', 'max:255'],
					'number_of_beds' => ['sometimes', 'numeric'],
					'website_url' => ['sometimes'],
					'year_established' => ['sometimes', 'numeric'],
					'overview' => ['sometimes', 'max:255'],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}

			// photo
			if ($request->hasFile('photo')) {
				$path = $request->file('photo')->store('hospital/facility_imgs', 'public');
				$path = "storage/$path";
				$hospital->photo = $path;
			}

			$hospital->update($validator->validated());
			$data = $request->only('name', 'email', 'state_id', 'district_id');

			if ($request->filled('password')) {
				$data['password'] = bcrypt($request->password);
			}

			$user->update($data);

			return redirect()->back()->with('success', 'Hospital Updated Successfully');
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
			$hospital = Hospital::findOrFail($id);
			$hospital->delete();
			return redirect()->back()->with('success', 'Hospital Deleted Successfully');
		} catch (\Exception $e) {
			return redirect()->back()->withErrors($e->getMessage());
		}
	}
}
