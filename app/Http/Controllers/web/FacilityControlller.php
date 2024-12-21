<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\web\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacilityControlller extends Controller
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
        $states = State::all();
        return view('web.facilities', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'state_id' => 'required|exists:states,id',
                'city_id' => 'required|exists:districts,id',
                'name' => 'required|string|max:100',
                'fname' => 'required|string|max:100',
                'lname' => 'required|string|max:100',
                'email' => 'required|email|unique:facilities,email|max:100',
                'phone_number' => 'required|string|max:20',
                'coverage_need' => 'required|string|max:800',

            ],
            [
                'state_id.exists' => 'The selected state is invalid.',
                'name.required' => 'The name field is required.',
                'name.max' => 'The name must not be greater than 100 characters.',
                'city_id.exists' => 'The selected city is invalid.',
                'fname.required' => 'The first name field is required.',
                'fname.max' => 'The first name must not be greater than 100 characters.',
                'lname.required' => 'The last name field is required.',
                'lname.max' => 'The last name must not be greater than 100 characters.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'email.unique' => 'The email has already been taken.',
                'email.max' => 'The email must not be greater than 100 characters.',
                'phone_number.required' => 'The phone number field is required.',
                'phone_number.max' => 'The phone number must not be greater than 20 characters.',
                'coverage_need.required' => 'The coverage need field is required.',
                'coverage_need.max' => 'The coverage need must not be greater than 800 characters.',

            ]
        );
        $facility = Facility::create($request->all());
        $lastInsertedId = $facility->id;
        $recent_facility = $this->sendFacilityMail($lastInsertedId);
        return redirect()->back()->with('success', 'Facility created successfully');
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
    public function sendFacilityMail($id)
    {
        $facility = DB::select("SELECT facilities.*,
        districts.name as city_name ,
        states.name as state_name
        FROM `facilities`
        left join districts on facilities.city_id = districts.id
        left join states on facilities.state_id = states.id WHERE facilities.id='$id';");
        $facility = $facility[0];

        $to = "maeamyers@gmail.com";
        $subject = "Facility Registered";
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
                <h3 align='center'>Facilty Registeration</h3>
                <b>Name of facility : </b>{$facility->name}<br />
                <b>Address : </b>{$facility->street},{$facility->city_name} {$facility->state_name}<br />
                <b>Point of Contact : </b>{$facility->fname} {$facility->lname} <br />
                <b>Email : </b>{$facility->email}<br />
                <b>Phone : </b>{$facility->phone_number}<br />
                <b>Coverage needs : </b>{$facility->coverage_need}<br />
              </body>
            </html>
  ";
       $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: locum@ampmlocum.com";
        mail($to, $subject, $message, $headers);
        mail('osama.elmahdy8912@gmail.com', $subject, $message, $headers);
        // if (mail($to, $subject, $message, $headers)) {
        //    // echo "Email sent successfully.";
        // } else {
        //    // echo "Failed to send email.";
        // }
    }
}

