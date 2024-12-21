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
        return view('web.medical-providers', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['shift_preference'] = implode(',', $data['shift_preference']);
        //    / Validate the request
        $validatedData = $request->validate(
            [
                'first_name' => 'required|string|max:100',
                'last_name' => 'required|string|max:100',
                'specialty_id' => 'required',
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
        $this->sendProviderMail($medicalProvider->id);
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
    public function sendProviderMail($id)
    {
        $provider = MedicalProvider::find($id);

        $to = "maeamyers@gmail.com";
        $subject = "Provider Registered";
        $message = "
               <!DOCTYPE html>
               <html lang='en'>
               <head>
                <meta charset='UTF-8' />
                <meta name='viewport' content='width=device-width, initial-scale=1.0' />
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                            <title></title>
                        <style>
                            #email-wrap {
                            background: #151515;
                            color: #FFF;
                            }
                        </style>
              </head>
              <body>
                <h3 align='center'>Provider Registeration</h3>
                <b>Name of provider : </b>{$provider->first_name} {$provider->last_name}<br />
                <b>Speciality : </b>{$provider->street},{$provider->specialty_id }<br />
                <b>Years of Experience: </b>{$provider->years_of_experience} <br />
                <b>Email : </b>{$provider->email}<br />
                <b>Phone : </b>{$provider->phone_number}<br />
                <b>Coverage needs : </b>{$provider->shift_preference}<br />
                <b>Coverage needs : </b>{$provider->shifts_per_month}<br />
              </body>
            </html>
  ";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: locum@ampmlocum.com";
        mail($to, $subject, $message, $headers);
        mail('osama.elmahdy8912@gmail.com', $subject, $message, $headers);

    }
}
