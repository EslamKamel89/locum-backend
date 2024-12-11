<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;
class DoctorController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$doctors = request()->has( 'limit' ) ?
			Doctor::paginate( request()->get( 'limit' ) ?? 10 ) :
			Doctor::all();
		return $this->success(
			DoctorResource::collection( $doctors ),
			pagination: request()->has( 'limit' ),
		);
	}



	/**
	 * Store a newly created resource in storage.
	 */
	public function store( Request $request ) {
		try {
			if ( auth()->user()->doctor ) {
				return $this->failure(
					message: 'Validation Failed',
					errors: [ 
						"There is already a Health Care Professional associated with this user"
					],
					statusCode: 422
				);
			}
			$validator = Validator::make(
				$request->all(),
				[ 
					'specialty_id' => [ 'sometimes', 'exists:specialties,id' ],
					'job_info_id' => [ 'sometimes', 'exists:job_infos,id' ],
					'date_of_birth' => [ 'required' ],
					'gender' => [ 'required', Rule::in( 'male', 'female' ) ],
					'address' => [ 'required' ],
					'phone' => [ 'required' ],
					'willing_to_relocate' => [ 'required', 'boolean' ],
					'photo' => [ 'sometimes', File::image()
						// ->min( 1024 )
						// ->max( 12 * 1024 )
					]
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'photo' ) ) {
				$path = $request->file( 'photo' )->store( 'doctor/personal_imgs', 'public' );
				$path = "storage/$path";
			}
			$doctor = Doctor::create(
				collect( $validator->validated() )
					->merge( [ 
						'user_id' => auth()->id(),
						'photo' => $path,
					] )->toArray()
			);
			return $this->success( new DoctorResource( $doctor ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$doctor = Doctor::findOrFail( $id );
			$doctor->Load( [ 'user', 'specialty', 'jobInfo', 'doctorInfo', 'doctorDocuments' ] );
			return $this->success( new DoctorResource( $doctor ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, string $id ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'specialty_id' => [ 'sometimes', 'exists:specialties,id' ],
					'job_info_id' => [ 'sometimes', 'exists:job_infos,id' ],
					'date_of_birth' => [ 'sometimes' ],
					'gender' => [ 'sometimes', Rule::in( 'male', 'female' ) ],
					'address' => [ 'sometimes' ],
					'phone' => [ 'sometimes' ],
					'willing_to_relocate' => [ 'sometimes', 'boolean' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$doctor = Doctor::findOrFail( $id );
			$doctor->update( $validator->validated() );
			$doctor->Load( [ 'user', 'specialty', 'jobInfo', 'doctorInfo', 'doctorDocuments' ] );
			return $this->success( $doctor );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$doctor = Doctor::findOrFail( $id );
			$doctor->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	public function updateUserImg( Doctor $doctor, Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'photo' => [ 'required', File::image() ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'photo' ) ) {
				$path = $request->file( 'photo' )->store( 'doctor/personal_imgs', 'public' );
				$path = "storage/$path";
			}
			$doctor->update( [ 'photo' => $path ] );
			return $this->success( $doctor );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
