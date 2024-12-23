<?php

namespace App\Http\Controllers\admin;

use App\Exceptions\NotAuthorizedException;
use App\Http\Resources\HospitalInfoResource;
use App\Models\HospitalInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class HospitalInfoController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$hospitalInfos = request()->has( 'limit' ) ?
			HospitalInfo::paginate( request()->get( 'limit' ) ?? 10 ) :
			HospitalInfo::all();
		return $this->success(
			HospitalInfoResource::collection( $hospitalInfos ),
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
					'license_number' => [ "required" ],
					'license_state' => [ "required" ],
					'license_issue_date' => [ "required", 'date' ],
					'license_expiry_date' => [ "required", 'date' ],
					'operating_hours' => [ "sometimes" ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}

			$hospitalInfo = null;
			if ( request()->has( 'id' ) ) {
				$hospitalInfo = HospitalInfo::findOrFail( request()->all()['id'] );
				$hospitalInfo->update( collect( $validator->validated() )
					->merge( [ 
						'hospital_id' => auth()->user()->hospital->id,
					] )
					->forget( [ 'id' ] )
					->toArray()
				);
			} else {
				$hospitalInfo = HospitalInfo::create(
					collect( $validator->validated() )
						->merge( [ 
							'hospital_id' => auth()->user()->hospital->id,
						] )
						->forget( [ 'id' ] )
						->toArray()
				);
			}

			return $this->success( new HospitalInfoResource( $hospitalInfo ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$hospitalInfo = HospitalInfo::findOrFail( $id );
			$hospitalInfo->Load( [ "hospital" ] );
			return $this->success( new HospitalInfoResource( $hospitalInfo ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, string $id ) {
		try {
			$hospitalInfo = HospitalInfo::findOrFail( $id );
			$this->checkResourceOwner( $hospitalInfo->hospital->user->id );
			$validator = Validator::make(
				$request->all(),
				[ 
					'license_number' => [ "sometimes" ],
					'license_state' => [ "sometimes" ],
					'license_issue_date' => [ "sometimes", 'date' ],
					'license_expiry_date' => [ "sometimes", 'date' ],
					'operating_hours' => [ "sometimes" ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$hospitalInfo->update( $validator->validated() );
			$hospitalInfo->Load( [ 'hospital' ] );
			return $this->success( new HospitalInfoResource( $hospitalInfo ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$hospitalInfo = HospitalInfo::findOrFail( $id );
			$this->checkResourceOwner( $hospitalInfo->hospital->user->id );
			$hospitalInfo->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
	protected function handleStoreAuthroizationCheck() {
		if ( auth()->user()->type !== 'hospital' ) {
			throw new NotAuthorizedException( [ "This user is not signed as a health care provider" ] );
		}
		if ( ! auth()->user()->hospital ) {
			throw new NotAuthorizedException( [ "this health care proivder didn't complete his basic profile information" ] );
		}
		if ( auth()->user()->hospital->hospitalInfo && ! request()->has( [ 'id' ] ) ) {
			throw new NotAuthorizedException( [ "This Health Care Provider already completed his profile" ] );
		}
	}
}
