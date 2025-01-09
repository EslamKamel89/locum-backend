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
use Illuminate\Support\Facades\Auth;

class HealthcareProfileController extends Controller
{
    public function index(): View
    {
        $states = State::all();
        $districts = District::all();
        $hospital = Hospital::where('user_id', auth()->user()->id)->first();
        $jobAdds = $hospital->jobAdds()->get();
        $jobApplications = JobApplication::get();
        $specialties = Specialty::all();
        $skills = Specialty::all();
        $jobs = JobInfo::all();
        $doctorRecommended = Doctor::take(5)->get();
        $jobApplicationStatus = JobApplicationStatus::cases();
        $shiftPreference = shiftPreference::cases();

        return view('healthcare.index', get_defined_vars());
    }

    public function show(): View
    {
        return view('healthcare.show');
    }

    public function update(Request $request): View
    {
        dd($request->all());
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'state_id' => 'required|exists:states,id',
                'district_id' => 'sometimes|exists:districts,id',
            ]);

            $user = Auth::user()->id;
            $user->update($request->all());

            $user->hospital->update($request->all());

            return view('healthcare.index')->with('success', 'Profile updated successfully');
        } catch (Exception $e) {
            return view('healthcare.index')->with('error', $e->getMessage());
        }
    }
}
