<?php

namespace App\Http\Controllers\admin;

use App\Models\Lang;
use App\Models\User;
use App\Enums\Gender;
use App\Models\Skill;
use App\Models\State;
use App\Models\Doctor;
use App\Enums\UserType;
use App\Models\JobInfo;
use App\Models\District;
use App\Models\Specialty;
use App\Models\DoctorInfo;
use App\Models\University;
use Illuminate\Http\Request;
use App\Enums\shiftPreference;
use App\Models\DoctorDocument;
use App\Traits\FileUploadTrait;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use App\Http\Resources\DoctorResource;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\NotAuthorizedException;
use Illuminate\Support\Facades\Http;

class DoctorController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = request()->has('limit') ?
            Doctor::latest()->paginate(request()->get('limit') ?? 10) :
            Doctor::latest()->get();

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
            $universities = University::all();

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
                    'name' => ['required'],
                    'email' => ['required', 'email', 'unique:users,email'],
                    'password' => ['required'],
                    'state_id' => ['sometimes', 'exists:states,id'],
                    'district_id' => ['sometimes', 'exists:districts,id'],
                    'specialty_name' => ['required'],
                    'job_info_name' => ['required'],
                    'date_of_birth' => ['required'],
                    'gender' => ['required', Rule::in('male', 'female')],
                    'address' => ['required'],
                    'phone' => ['required'],
                    'willing_to_relocate' => ['required', 'boolean'],
                    'photo' => ['sometimes', 'nullable', File::image()],
                    'langs' => ['sometimes'],
                    'skills' => ['sometimes'],
                ]
            );
            if ($validator->fails()) {
                return $this->handleValidation($validator);
            }

            DB::beginTransaction();

            $data = $request->only(['name', 'email', 'password', 'state_id', 'district_id', 'type']);
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);

            $doctor = Doctor::create(
                collect($validator->validated())
                    ->merge([
                        'user_id' => $user->id,
                        'willing_to_relocate' => request()->input('willing_to_relocate') == 'on' ? 1 : 0
                    ])
                    ->forget(['name', 'email', 'password', 'state_id', 'district_id', 'specialty_name', 'job_info_name', 'langs', 'skills'])
                    ->toArray()
            );

            $this->attachJobInfo($doctor);
            $this->attachSpeciality($doctor);
            $this->handleSkillAttach($doctor);
            $this->handleLangAttach($doctor);
            $doctor->load(['skills', 'langs']);

            DB::commit();
            return $this->success(new DoctorResource($doctor));
        } catch (\Exception $e) {
            return $this->handleException($e);
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
            $doctor = new DoctorResource($doctor);
            return view('', get_defined_vars());
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $doctor = Doctor::findOrFail($id);
            $doctor->Load(['user', 'specialty', 'jobInfo']);
            $specialties = Specialty::all();
            $jobInfos = JobInfo::all();
            $states = State::all();
            $districts = District::all();
            $genders = Gender::cases();
            $skills = Skill::all();
            $langs = Lang::all();
            $shiftPreferences = shiftPreference::cases();
            $universities = University::all();
            return view('admin.doctors.edit', get_defined_vars());
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
            $doctor = Doctor::findOrFail($id);
            $user = $doctor->user;

            $validator = Validator::make(
                $request->all(),
                [
                    'specialty_id' => ['sometimes', 'exists:specialties,id'],
                    'job_info_id' => ['sometimes', 'exists:job_infos,id'],
                    'date_of_birth' => ['sometimes'],
                    'gender' => ['sometimes', Rule::in('male', 'female')],
                    'address' => ['sometimes'],
                    'phone' => ['sometimes']
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('doctor/personal_imgs', 'public');
                $path = "storage/$path";
                $doctor->photo = $path;
            }

            $doctor->update(collect($validator->validated())->merge(['willing_to_relocate' => $request->filled('willing_to_relocate') ? 1 : 0])->toArray());
            $doctor->doctorInfo->update(collect($request->only([
                'professional_license_number',
                'license_state',
                'license_issue_date',
                'license_expiry_date',
                'highest_degree',
                'field_of_study',
                'graduation_year',
                'work_experience',
                'biography'
            ]))->toArray());

            // Fetch and delete all documents from the database
            // $doctorDocuments = $doctor->doctorDocuments;
            // foreach ($doctorDocuments as $document) {
            //     if (file_exists(public_path($document->file))) {
            //         unlink(public_path($document->file));
            //     }
            //     $document->delete();
            // }

            // Add new documents to the database
            // if (isset($request['documents']) && is_array($request['documents']) && count($request['documents']) > 0) {
            //     foreach ($request['documents'] as $document) {
            //         if (isset($document['document_file'])) {
            //             $filePath = $document['document_file']->store('doctor/files', 'public');
            //             DoctorDocument::create([
            //                 'doctor_id' => $doctor->id,
            //                 'name' => $document['document_name'],
            //                 'type' => $document['document_type'],
            //                 'file' => $filePath,
            //             ]);
            //         }
            //     }
            // }

            $data = $request->only('name', 'email', 'state_id', 'district_id');

            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            $this->attachJobInfo($doctor);
            $this->attachSpeciality($doctor);
            $this->handleSkillAttach($doctor);
            $this->handleLangAttach($doctor);
            return redirect()->back()->with('success', 'Doctor Updated Successfully');
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
            $doctor = Doctor::findOrFail($id);
            $doctor->delete();
            return redirect()->back()->with('success', 'Doctor Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    protected function handleSkillAttach(Doctor $doctor)
    {
        $skills = request()->has('skills') ? request()->only('skills')['skills'] : null;
        if (!$skills || count($skills) == 0) {
            $doctor->skills()->detach();
            return;
        }

        $skillIds = collect([]);
        foreach ($skills as $skillName) {
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
        $languages = request()->has('langs') ? request()->only('langs')['langs'] : null;
        if (!$languages || count($languages) == 0) {
            $doctor->langs()->detach();
            return;
        }

        $langIds = collect([]);
        foreach ($languages as $langName) {
            $langName = str($langName)->trim()->lower();
            $lang = Lang::where('name', $langName)->first();
            if (!$lang) {
                $lang = Lang::create(['name' => $langName]);
            }
            $langIds->add($lang->id);
        }
        $doctor->langs()->sync($langIds);
    }

    protected function attachSpeciality(Doctor $doctor)
    {
        if (!request()->has('specialty_name'))
            return;
        $specialityName = strtolower(trim(request()->input('specialty_name')));
        $speciality = Specialty::where('name', $specialityName)->first();
        if (!$speciality) {
            $speciality = Specialty::create(['name' => $specialityName]);
        }
        $doctor->update(['specialty_id' => $speciality->id]);
    }

    protected function attachJobInfo(Doctor $doctor)
    {
        if (!request()->has('job_info_name'))
            return;
        $jobInfoName = strtolower(trim(request()->input('job_info_name')));
        $jobInfo = JobInfo::where('name', $jobInfoName)->first();
        if (!$jobInfo) {
            $jobInfo = JobInfo::create(['name' => $jobInfoName]);
        }
        $doctor->update(['job_info_id' => $jobInfo->id]);
    }
}

