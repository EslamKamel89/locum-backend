<?php

namespace App\Http\Controllers\doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\JobAdd;

class DoctorHomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $doctor = $user->doctor;
        $doctors = Doctor::all();
        $jobAdds = JobAdd::all();
        return view('doctor.home', get_defined_vars());
    }

}
