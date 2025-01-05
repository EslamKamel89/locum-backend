<?php

namespace App\Http\Controllers\healthcare;

use App\Enums\JobApplicationStatus;
use Exception;
use App\Models\State;
use App\Models\District;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\JobInfo;
use App\Models\Specialty;

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
        $jobs = JobInfo::all();
        $jobApplicationStatus = JobApplicationStatus::cases();

        return view('healthcare.index', get_defined_vars());
    }

    public function show(): View
    {
        return view('healthcare.show');
    }

    public function update(Request $request): View
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'state_id' => 'required|exists:states,id',
                'district_id' => 'sometimes|exists:districts,id',
            ]);

            $user = auth()->user();
            $user->update($request->all());

            $user->hospital->update($request->all());

            return view('healthcare.index')->with('success', 'Profile updated successfully');
        } catch (Exception $e) {
            return view('healthcare.index')->with('error', $e->getMessage());
        }
    }
}
