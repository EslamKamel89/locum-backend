<?php

namespace App\Http\Controllers\healthcare;

use Exception;
use App\Models\State;
use App\Models\Doctor;
use App\Models\JobInfo;
use App\Models\District;
use App\Models\Hospital;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Enums\shiftPreference;
use App\Models\JobApplication;
use App\Enums\JobApplicationStatus;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\HospitalInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HealthcareProfileController extends Controller
{
    public function index(): View
    {
        $hospital = Hospital::where('user_id', auth()->user()->id)->first();
        $states = State::all();
        $districts = District::all();
        $jobAdds = $hospital->jobAdds()->get();
        $jobApplications = JobApplication::get();
        $specialties = Specialty::all();
        $skills = Specialty::all();
        $jobs = JobInfo::all();
        $doctorRecommended = Doctor::take(5)->get();
        $jobApplicationStatus = JobApplicationStatus::cases();
        $shiftPreference = shiftPreference::cases();
        $hospitalSpecialties = $hospital->specialties()->get();
        $services = HospitalInfo::find($hospital->id)->services_offered;
        // dd($services);
        return view('healthcare.index', get_defined_vars());
    }

    public function show(): View
    {
        return view('healthcare.show');
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());
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
                    'address2' => ['sometimes', 'max:255'],
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
            if (isset($request->specialty_id) && count($request->specialty_id) > 0) {
                $specialtyIds = $this->ensureSpecialtiesExist($request->specialty_id);
                $hospital->specialties()->sync($specialtyIds);
            }
            $data = $request->only('name', 'email', 'state_id', 'district_id');

            if ($request->filled('password')) {
                $data['password'] = bcrypt($request->password);
            }

            $user->update($data);

            if (isset($request->services_offered) && count($request->services_offered) > 0) {
                $hospital->hospitalInfo->services_offered = $request->services_offered;
                $hospital->hospitalInfo->update();
            }

            return redirect()->back()->with('success', 'Hospital Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    protected function ensureSpecialtiesExist(array $specialtyIds): array
    {
        // 1. استرجاع التخصصات الموجودة من قاعدة البيانات
        $existingSpecialties = Specialty::whereIn('id', $specialtyIds)->pluck('id')->toArray();
        // 2. تحديد التخصصات المفقودة
        $missingSpecialties = array_diff($specialtyIds, $existingSpecialties);

        // 3. إذا كانت هناك تخصصات مفقودة، إضافتها إلى قاعدة البيانات
        $newSpecialties = collect();
        if (!empty($missingSpecialties)) {
            foreach ($missingSpecialties as $name) {
                $newSpecialties->push(Specialty::create(['name' => $name])->id);
            }
        }

        // 4. إرجاع جميع معرفات التخصصات الموجودة والمضافة حديثًا
        return Specialty::whereIn('id', collect($newSpecialties)->merge($specialtyIds))->pluck('id')->toArray();
    }

}
