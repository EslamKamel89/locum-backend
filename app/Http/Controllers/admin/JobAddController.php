<?php

namespace App\Http\Controllers\admin;

use App\Models\Lang;
use App\Models\Skill;
use App\Models\JobAdd;
use App\Models\JobInfo;
use App\Models\Hospital;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\JobAddResource;
use Illuminate\Support\Facades\Validator;
use App\Exceptions\NotAuthorizedException;

class JobAddController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $jobAddsQuery = JobAdd::with(['hospital.user.state', 'specialty', 'jobInfo'])
            ->filter()
            ->sort();
        $this->pr($jobAddsQuery->toRawSql());
        $jobAdds = $jobAddsQuery->paginate(request()->get('limit') ?? 10);

        return view('admin.job-adds.index', get_defined_vars());
    }

    public function create()
    {
        $hospitals = Hospital::with('user')->get();
        $jobInfos = JobInfo::get(['id', 'name']);
        $specialties = Specialty::get(['id', 'name']);

        return view('admin.job-adds.create', get_defined_vars());
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
                    'title' => ['required'],
                    'hospital_id' => ['required', 'exists:hospitals,id'],
                    'speciality_id' => ['sometimes', 'exists:specialties,id'],
                    'job_info_id' => ['sometimes', 'exists:job_infos,id'],
                    'job_type' => ['sometimes'],
                    'location' => ['sometimes'],
                    'description' => ['sometimes'],
                    'responsibilities' => ['sometimes'],
                    'qualifications' => ['sometimes'],
                    'experience_required' => ['sometimes'],
                    'salary_min' => ['sometimes', 'numeric'],
                    'salary_max' => ['sometimes', 'numeric'],
                    'benefits' => ['sometimes'],
                    'working_hours' => ['sometimes'],
                    'application_deadline' => ['sometimes', 'date'],
                    'required_documents' => ['sometimes'],

                ]
            );

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            $jobAdd = JobAdd::create($validator->validated());
            $this->handleSkillAttach($jobAdd);
            $this->handleLangAttach($jobAdd);
            $jobAdd->load(['langs', 'skills', 'hospital', 'specialty', 'jobInfo']);
            return redirect()->back()->with('success', 'Job Add Created Successfully');
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
            $jobAdd = JobAdd::findOrFail($id);
            $jobAdd->Load(['langs', 'skills', 'hospital', 'specialty', 'jobInfo']);
            return $this->success($jobAdd);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function edit(string $id)
    {
        try {
            $jobAdd = JobAdd::findOrFail($id);
            $jobAdd->Load(['langs', 'skills', 'hospital', 'specialty', 'jobInfo']);
            $hospitals = Hospital::with('user')->get();
            $jobInfos = JobInfo::get(['id', 'name']);
            $specialties = Specialty::get(['id', 'name']);
            return view('admin.job-adds.edit', get_defined_vars());
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
            $jobAdd = JobAdd::findOrFail($id);
            $validator = Validator::make(
                $request->all(),
                [
                    'title' => ['sometimes'],
                    'speciality_id' => ['sometimes', 'exists:specialties,id'],
                    'job_info_id' => ['sometimes', 'exists:job_infos,id'],
                    'job_type' => ['sometimes'],
                    'location' => ['sometimes'],
                    'description' => ['sometimes'],
                    'responsibilities' => ['sometimes'],
                    'qualifications' => ['sometimes'],
                    'experience_required' => ['sometimes'],
                    'salary_min' => ['sometimes', 'numeric'],
                    'salary_max' => ['sometimes', 'numeric'],
                    'benefits' => ['sometimes'],
                    'working_hours' => ['sometimes'],
                    'application_deadline' => ['sometimes', 'date'],
                    'required_documents' => ['sometimes'],
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            $jobAdd->update($validator->validated());
            $jobAdd->Load(['langs', 'skills', 'hospital', 'specialty', 'jobInfo']);
            return redirect()->back()->with('success', 'Job Add Updated Successfully');
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
            $jobAdd = JobAdd::findOrFail($id);
            $jobAdd->delete();
            return redirect()->back()->with('success', 'Job Add Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    protected function handleSkillAttach(JobAdd $jobAdd)
    {
        $skillNames = [];
        if (!(request()->has('skills'))) {
            return;
        }
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
        $jobAdd->skills()->attach($skillIds);
    }
    protected function handleLangAttach(JobAdd $jobAdd)
    {
        $langNames = [];
        if (!(request()->has('langs'))) {
            return;
        }
        $langNames = explode(',', request()->only('langs')['langs']);

        $langIds = collect([]);
        foreach ($langNames as $langName) {
            $langName = str($langName)->trim()->lower();
            $lang = Lang::where('name', $langName)->first();
            if (!$lang) {
                $lang = Lang::create(['name' => $langName]);
            }
            $langIds->add($lang->id);
        }
        $jobAdd->langs()->attach($langIds);
    }

    protected function handleStoreAuthroizationCheck()
    {
        if (auth()->user()->type !== 'hospital') {
            throw new NotAuthorizedException(["This user is not signed as a health care provider"]);
        }
        if (!auth()->user()->hospital) {
            throw new NotAuthorizedException(["this health care proivder didn't complete his basic profile information"]);
        }
        if (!auth()->user()->hospital->hospitalInfo) {
            throw new NotAuthorizedException(["This Health Care Provider didn't complete his profile information"]);
        }
    }
}

