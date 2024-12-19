<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Models\web\MedicalProvider;
use Illuminate\Http\Request;

class MedicalProviders extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialties = Specialty::all();
        return view('web.medical-providers',compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['shift_preference'] = implode(',', $data['shift_preference']);
    //    / Validate the request
             $validatedData = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'specialty_id' => 'required|integer|exists:specialties,id',
            'years_of_experience' => 'required|integer',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:medical_providers,email|max:100',
            'shift_preference' => 'required|max:100',
            'shifts_per_month' => 'required|integer',
             ],
             [
            'specialty_id.exists' => 'The selected specialty is invalid.',
            'email.unique' => 'The email has already been taken.',
            'email.email' => 'The email must be a valid email address.',
            'phone_number.max' => 'The phone number must not be greater than 20 characters.',
            'email.max' => 'The email must not be greater than 100 characters.',
            'shift_preference.max' => 'The shift preference must not be greater than 100 characters.',
            'first_name.max' => 'The first name must not be greater than 100 characters.',
            'last_name.max' => 'The last name must not be greater than 100 characters.',
            'shifts_per_month.integer' => 'The shifts per month must be an integer.',
            'years_of_experience.integer' => 'The years of experience must be an integer.',
            'phone_number.required' => 'The phone number field is required.',
            'email.required' => 'The email field is required.',
            'shift_preference.required' => 'Please select shift preference.',
            'shifts_per_month.required' => 'The shifts per month field is required.',
            'years_of_experience.required' => 'The years of experience field is required.',
            'specialty_id.required' => 'The specialty field is required.',
            'first_name.required' => 'The first name field is required.',
            'last_name.required' => 'The last name field is required.',

             ]
            );
             // Create a new medical provide
              $medicalProvider = MedicalProvider::create($data);
             // Return a response
            return redirect()->route('providers.create')->with('success', 'Medical provider created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
