<?php

namespace App\Http\Controllers\admin;

use App\Models\Lang;
use App\Models\User;
use App\Enums\Gender;
use App\Enums\shiftPreference;
use App\Models\Skill;
use App\Models\State;
use App\Models\Doctor;
use App\Enums\UserType;
use App\Models\JobInfo;
use App\Models\District;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\File;
use App\Http\Resources\DoctorResource;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\NotAuthorizedException;

class DoctorController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$doctors = request()->has('limit') ?
			Doctor::paginate(request()->get('limit') ?? 10) :
			Doctor::all();

		$doctors = DoctorResource::collection($doctors);
		return view('admin.doctors.index', get_defined_vars());
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

			return view('admin.doctors.create', get_defined_vars());
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
					'id' => ['sometimes', 'exists:doctors,id'],
					'specialty_name' => ['required'],
					'job_info_name' => ['required'],
					'date_of_birth' => ['required'],
					'gender' => ['required', Rule::in(Gender::cases())],
					'address' => ['required'],
					'phone' => ['required'],
					'langs' => ['sometimes'],
					'skills' => ['sometimes'],
				]
			);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator);
			}

			DB::beginTransaction();

			$path = null;
			if ($request->hasFile('photo')) {
				$path = $request->file('photo')->store('doctor/personal_imgs', 'public');
				$path = "storage/$path";
			}

			// Store User
			// Store Doctor
			// Store Doctor Relations

			$user = new User();
			$user->name = request()->input('name');
			$user->email = request()->input('email');
			$user->password = bcrypt(request()->input('password'));
			$user->state_id = request()->input('state_id');
			$user->district_id = request()->input('district_id');
			$user->type = UserType::doctor;
			$user->save();

			$doctor = new Doctor();
			$doctor->user_id = $user->id;
			$doctor->specialty_id = request()->input('specialty_name');
			$doctor->job_info_id = request()->input('job_info_name');
			$doctor->date_of_birth = request()->input('date_of_birth');
			$doctor->gender = request()->input('gender');
			$doctor->address = request()->input('address');
			$doctor->phone = request()->input('phone');
			$doctor->willing_to_relocate = request()->input('willing_to_relocate');
			$doctor->shift_preference = request()->input('shift_preference');
			$doctor->photo = $path;
			$doctor->save();

			$doctor->langs()->sync(request()->input('langs'));
			$doctor->skills()->sync(request()->input('skills'));

			DB::commit();
			return redirect()->back()->with('success', 'Doctor Created Successfully');
		} catch (\Exception $e) {
			DB::rollBack();
			return redirect()->back()->withErrors($e->getMessage());
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		try {
			$doctor = Doctor::findOrFail($id);
			$doctor->Load(['user', 'specialty', 'jobInfo', 'doctorInfo', 'doctorDocuments']);
			return $this->success(new DoctorResource($doctor));
		} catch (\Exception $e) {
			return $this->handleException($e);
		}
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		try {
			$doctor = Doctor::findOrFail($id);
			$this->checkResourceOwner($doctor->user->id);
			$validator = Validator::make(
				$request->all(),
				[
					'specialty_id' => ['sometimes', 'exists:specialties,id'],
					'job_info_id' => ['sometimes', 'exists:job_infos,id'],
					'date_of_birth' => ['sometimes'],
					'gender' => ['sometimes', Rule::in('male', 'female')],
					'address' => ['sometimes'],
					'phone' => ['sometimes'],
					'willing_to_relocate' => ['sometimes', 'boolean'],
				]
			);
			if ($validator->fails()) {
				return $this->handleValidation($validator);
			}
			$doctor->update($validator->validated());
			$doctor->Load(['user', 'specialty', 'jobInfo', 'doctorInfo', 'doctorDocuments']);
			return $this->success(new DoctorResource($doctor));
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
			$doctor = Doctor::findOrFail($id);
			$this->checkResourceOwner($doctor->user->id);
			$doctor->delete();
			return $this->success([], message: 'Resource Deleted Successfully');
		} catch (\Exception $e) {
			return $this->handleException($e);
		}
	}

	public function updateUserImg(Doctor $doctor, Request $request)
	{
		try {
			$validator = Validator::make(
				$request->all(),
				[
					'photo' => ['required', File::image()],
				]
			);
			if ($validator->fails()) {
				return $this->handleValidation($validator);
			}
			$path = null;
			if ($request->hasFile('photo')) {
				$path = $request->file('photo')->store('doctor/personal_imgs', 'public');
				$path = "storage/$path";
			}
			$doctor->update(['photo' => $path]);
			$doctor->Load(['user', 'specialty', 'jobInfo', 'doctorInfo', 'doctorDocuments']);
			return $this->success(new DoctorResource($doctor));
		} catch (\Exception $e) {
			return $this->handleException($e);
		}
	}

	protected function handleSkillAttach(Doctor $doctor)
	{
		$skillNames = [];
		$skills = request()->has('skills') ? request()->only('skills')['skills'] : null;
		if (!$skills || str($skills)->trim()->isEmpty()) {
			$doctor->skills()->detach();
			return;
		}
		dd($skills);
		$skillNames = explode(',', request()->only('skills')['skills']);

		$skillIds = collect([]);
		foreach ($skillNames as $skillName) {
			$skillName = str($skillName)->trim()->lower();
			$skill = Skill::where('name', $skillName)->first();
			if (!$skill) {
				$skill = Skill::create(['name' => $skillName]);
			}
			$skillIds->add($skill->id);
		}
		$doctor->skills()->sync($skillIds);
	}

	protected function handleLangAttach(Doctor $doctor)
	{
		$langNames = [];
		$languages = request()->has('langs') ? request()->only('langs')['langs'] : null;
		if (!$languages || str($languages)->trim()->isEmpty()) {
			$doctor->langs()->detach();
			return;
		}
		$langNames = explode(',', request()->only('langs')['langs']);

		$langIds = collect([]);
		foreach ($langNames as $langName) {
			$langName = str($langName)->trim()->lower();
			$lang = Lang::where('name', $langName)->first();

			// foreach ( $doctor->langs as $doctorLang ) {
			// }
			if (!$lang) {
				$lang = Lang::create(['name' => $langName]);
			}
			$langIds->add($lang->id);
		}
		$doctor->langs()->sync($langIds);
	}
}

