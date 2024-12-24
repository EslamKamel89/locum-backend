<?php

namespace App\Http\Controllers\admin;

use App\Exceptions\NotAuthorizedException;
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
			$this->handleStoreAuthroizationCheck();

			$validator = Validator::make(
				$request->all(),
				[ 
					'facility_name' => [ 'required' ],
					'type' => [ 'required' ],
					'contact_person' => [ 'sometimes', 'nullable' ],
					'contact_email' => [ 'sometimes', 'email', 'nullable' ],
					'contact_phone' => [ 'sometimes', 'nullable' ],
					'address' => [ 'sometimes', 'nullable', 'max:255' ],
					'services_offered' => [ 'sometimes', 'nullable', 'max:255' ],
					'number_of_beds' => [ 'sometimes', 'nullable', 'numeric' ],
					'website_url' => [ 'sometimes', 'nullable' ],
					'year_established' => [ 'sometimes', 'nullable', 'numeric' ],
					'overview' => [ 'sometimes', 'nullable', 'max:255' ],
					'photo' => [ 'sometimes', 'nullable', 'nullable', File::image()
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
			$hospital = null;
			if ( request()->has( 'id' ) ) {
				$hospital = Hospital::findOrFail( request()->all()['id'] );
				$hospital->update( collect( $validator->validated() )
					->merge( [ 
						'user_id' => auth()->id(),
						'photo' => $path,
					] )
					->forget( [ 'id' ] )
					->reject( fn( $value, $key ) => $key == 'photo' && $value == null )
					->toArray()
				);
			} else {
				$hospital = Hospital::create(
					collect( $validator->validated() )
						->merge( [ 
							'user_id' => auth()->id(),
							'photo' => $path,
						] )
						->forget( [ 'id' ] )
						->toArray()
				);
			}

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
			$hospital = Hospital::findOrFail( $id );
			$this->checkResourceOwner( $hospital->user->id );
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
			$hospital = Hospital::findOrFail( $id );
			$this->checkResourceOwner( $hospital->user->id );
			$hospital->delete();
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
	protected function handleStoreAuthroizationCheck() {
		if ( auth()->user()->type !== 'hospital' ) {
			throw new NotAuthorizedException( [ "This user is not signed as a health care provider" ] );
		}
		if ( auth()->user()->hospital && ! request()->has( [ 'id' ] ) ) {
			throw new NotAuthorizedException( [ "This health care provider completed his basic information" ] );
		}
	}
}
