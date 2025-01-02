<?php

namespace App\Http\Controllers\hospital;

use App\Models\State;
use App\Models\District;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HospitalResource;
use Illuminate\Support\Facades\Validator;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hospital = Hospital::where('user_id', auth()->user()->id)->first();
        $states = State::all();
        $districts = District::all();
        return view('healthcare.profile', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:hospitals',
            'password' => 'required|string|min:6|confirmed',
            'photo' => 'required|file|image',
        ]);

        if ($validator->fails()) {
            return $this->handleValidation($validator);
        }

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('hospital/facility_imgs', 'public');
            $path = "storage/$path";
        }

        $hospital = Hospital::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'photo' => $path,
        ]);

        return $this->success(new HospitalResource($hospital));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $hospital = Hospital::findOrFail($id);
            $hospital->Load(['user', "hospitalInfo", "hospitalDocuments", "jobAdds"]);
            return $this->success(new HospitalResource($hospital));
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:hospitals,email,' . $id,
            'password' => 'sometimes|nullable|string|min:6|confirmed',
            'photo' => [ 'sometimes', 'nullable', File::image() ],
        ]);

        if ($validator->fails()) {
            return $this->handleValidation($validator);
        }

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('hospital/facility_imgs', 'public');
            $path = "storage/$path";
        }

        $hospital = Hospital::findOrFail($id);
        $hospital->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->has('password') ? bcrypt($request->input('password')) : $hospital->password,
            'photo' => $path ?? $hospital->photo,
        ]);

        return $this->success(new HospitalResource($hospital));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $hospital = Hospital::findOrFail($id);
            $hospital->delete();
            return $this->success([], message: 'Resource Deleted Successfully');
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }
}
