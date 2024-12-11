<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\HospitalResource;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
class HospitalController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$hospitals = request()->has( 'limit' ) ?
			Hospital::paginate( request()->get( 'limit' ) ?? 10 ) :
			Hospital::all();
		return $this->success(
			HospitalResource::collection( $hospitals ),
			pagination: request()->has( 'limit' ),
		);
	}



	/**
	 * Store a newly created resource in storage.
	 */
	public function store( Request $request ) {
		try {
			if ( auth()->user()->hospital ) {
				return $this->failure(
					message: 'Validation Failed',
					errors: [ 
						"There is already a Health Care Provider associated with this user"
					],
					statusCode: 422
				);
			}
			$validator = Validator::make(
				$request->all(),
				[ 
					'facility_name' => [ 'required' ],
					'type' => [ 'required' ],
					'contact_person' => [ 'sometimes' ],
					'contact_email' => [ 'sometimes', 'email' ],
					'contact_phone' => [ 'sometimes' ],
					'address' => [ 'sometimes', 'max:255' ],
					'services_offered' => [ 'sometimes', 'max:255' ],
					'number_of_beds' => [ 'sometimes', 'numeric' ],
					'website_url' => [ 'sometimes' ],
					'year_established' => [ 'sometimes', 'numeric' ],
					'overview' => [ 'sometimes', 'max:255' ],
					'photo' => [ 'sometimes', File::image()
						// ->min( 1024 )
						// ->max( 12 * 1024 )
					],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'photo' ) ) {
				$path = $request->file( 'photo' )->store( 'hospital/facility_imgs', 'public' );
				$path = "storage/$path";
			}
			$hospital = Hospital::create(
				collect( $validator->validated() )
					->merge( [ 
						'user_id' => auth()->id(),
						'photo' => $path,
					] )->toArray()
			);
			return $this->success( new HospitalResource( $hospital ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$hospital = Hospital::findOrFail( $id );
			$hospital->Load( [ 'user', "hospitalInfo", "hospitalDocuments", "jobAdds" ] );
			return $this->success( new HospitalResource( $hospital ) );
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
					'facility_name' => [ 'sometimes' ],
					'type' => [ 'sometimes' ],
					'contact_person' => [ 'sometimes' ],
					'contact_email' => [ 'sometimes', 'email' ],
					'contact_phone' => [ 'sometimes' ],
					'address' => [ 'sometimes', 'max:255' ],
					'services_offered' => [ 'sometimes', 'max:255' ],
					'number_of_beds' => [ 'sometimes', 'numeric' ],
					'website_url' => [ 'sometimes' ],
					'year_established' => [ 'sometimes', 'number' ],
					'overview' => [ 'sometimes', 'max:255' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$hospital = Hospital::findOrFail( $id );
			$hospital->update( $validator->validated() );
			$hospital->Load( [ 'user', "hospitalInfo", "hospitalDocuments", "jobAdds" ] );
			return $this->success( new HospitalResource( $hospital ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$hosptial = Hospital::findOrFail( $id );
			$hosptial->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	public function updateHospitalImg( Hospital $hospital, Request $request ) {
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
				$path = $request->file( 'photo' )->store( 'hospital/facility_imgs', 'public' );
				$path = "storage/$path";
			}
			$hospital->update( [ 'photo' => $path ] );
			$hospital->Load( [ 'user', "hospitalInfo", "hospitalDocuments", "jobAdds" ] );
			return $this->success( new HospitalResource( $hospital ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

}
