<?php

namespace App\Http\Controllers\api;

use App\Exceptions\NotAuthorizedException;
use App\Http\Resources\DoctorInfoResource;
use App\Models\DoctorInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class DoctorInfoController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$doctorInfos = request()->has( 'limit' ) ?
			DoctorInfo::paginate( request()->get( 'limit' ) ?? 10 ) :
			DoctorInfo::all();
		return $this->success(
			DoctorInfoResource::collection( $doctorInfos ),
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
					'professional_license_number' => [ 'required' ],
					'license_state' => [ 'required' ],
					'license_issue_date' => [ 'required', 'date' ],
					'license_expiry_date' => [ 'required', 'date' ],
					'university_id' => [ 'sometimes', 'exists:universities,id' ],
					'highest_degree' => [ 'required' ],
					'field_of_study' => [ 'required' ],
					'graduation_year' => [ 'sometimes', 'numeric' ],
					'work_experience' => [ 'sometimes', 'max:255' ],
					'cv' => [ 'sometimes', File::types( mimetypes: [ 'doc', 'pdf' ] ) ],
					'biography' => [ 'sometimes', 'max:255' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'cv' ) ) {
				$path = $request->file( 'cv' )->store( 'doctor/cv', 'public' );
				$path = "storage/$path";
			}
			$doctorInfo = DoctorInfo::create(
				collect( $validator->validated() )
					->merge( [ 
						'doctor_id' => auth()->user()->doctor->id,
						'cv' => $path,
					] )->toArray()
			);
			return $this->success( new DoctorInfoResource( $doctorInfo ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$doctorInfo = DoctorInfo::findOrFail( $id );
			$doctorInfo->Load( [ 'doctor', 'university' ] );
			return $this->success( new DoctorInfoResource( $doctorInfo ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}


	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, string $id ) {
		try {
			$doctorInfo = DoctorInfo::findOrFail( $id );
			$this->checkResourceOwner( $doctorInfo->doctor->user->id );
			$validator = Validator::make(
				$request->all(),
				[ 
					'professional_license_number' => [ 'sometimes' ],
					'license_state' => [ 'sometimes' ],
					'license_issue_date' => [ 'sometimes', 'date' ],
					'license_expiry_date' => [ 'sometimes', 'date' ],
					'university_id' => [ 'sometimes', 'exists:universities,id' ],
					'highest_degree' => [ 'sometimes' ],
					'field_of_study' => [ 'sometimes' ],
					'graduation_year' => [ 'sometimes', 'numeric' ],
					'work_experience' => [ 'sometimes', 'max:255' ],
					'biography' => [ 'sometimes', 'max:255' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$doctorInfo->update( $validator->validated() );
			$doctorInfo->Load( [ 'doctor', 'university' ] );
			return $this->success( new DoctorInfoResource( $doctorInfo ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$doctorInfo = DoctorInfo::findOrFail( $id );
			$this->checkResourceOwner( $doctorInfo->doctor->user->id );
			$doctorInfo->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	public function updateDoctorCv( string $id, Request $request ) {
		try {
			$doctorInfo = DoctorInfo::findOrFail( $id );
			$validator = Validator::make(
				$request->all(),
				[ 
					'cv' => [ 'required', File::types( mimetypes: [ 'doc', 'pdf' ] ) ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'cv' ) ) {
				$path = $request->file( 'cv' )->store( 'doctor/cv', 'public' );
				$path = "storage/$path";
			}
			$doctorInfo->update( [ 'cv' => $path ] );
			$doctorInfo->Load( [ 'doctor', 'university' ] );
			return $this->success( new DoctorInfoResource( $doctorInfo ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
	protected function handleStoreAuthroizationCheck() {
		if ( auth()->user()->type !== 'doctor' ) {
			throw new NotAuthorizedException( [ "This user is not signed as a health care professional" ] );
		}
		if ( ! auth()->user()->doctor ) {
			throw new NotAuthorizedException( [ "this health care professional didn't complete his basic profile information" ] );
		}
		if ( auth()->user()->doctor->doctorInfo ) {
			throw new NotAuthorizedException( [ "This Health Care Professional already completed his profile" ] );
		}
	}
}
