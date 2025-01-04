<?php

namespace App\Http\Controllers\healthcare;

use App\Models\State;
use App\Models\District;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Http\Controllers\Controller;

class HealthcareProfileController extends Controller
{
    public function index(){
        $states = State::all();
        $districts = District::all();
        $hospital = Hospital::where('user_id', auth()->user()->id)->first();
        $jobAdds = $hospital->jobAdds()->get();
        $jobApplications = JobApplication::get();

        return view('healthcare.index', get_defined_vars());
    }
}
