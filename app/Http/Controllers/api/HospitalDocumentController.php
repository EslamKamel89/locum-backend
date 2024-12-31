<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\HospitalDocumentResource;
use App\Models\HospitalDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
class HospitalDocumentController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$hospitalDocument = request()->has( 'limit' ) ?
			HospitalDocument::paginate( request()->get( 'limit' ) ?? 10 ) :
			HospitalDocument::all();
		return $this->success(
			HospitalDocumentResource::collection( $hospitalDocument ),
			pagination: request()->has( 'limit' ),
		);
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store( Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'type' => [ 'required' ],
					'name' => [ 'required' ],
					'file' => [ 'required', File::types( mimetypes: [ 'doc', 'pdf' ] ) ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'file' ) ) {
				$path = $request->file( 'file' )->store( 'hospital/files', 'public' );
				$path = "storage/$path";
			}
			$hospitalDocument = HospitalDocument::create(
				collect( $validator->validated() )
					->merge( [ 
						'hospital_id' => auth()->user()->hospital->id,
						'file' => $path,
					] )->toArray()
			);
			return $this->success( new HospitalDocumentResource( $hospitalDocument ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$hospitalDocument = HospitalDocument::findOrFail( $id );
			$hospitalDocument->Load( [ 'hospital' ] );
			return $this->success( new HospitalDocumentResource( $hospitalDocument ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}


	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, string $id ) {
		try {
			$hospitalDocument = HospitalDocument::findOrFail( $id );
			$this->checkResourceOwner( $hospitalDocument->hospital->user->id );
			$validator = Validator::make(
				$request->all(),
				[ 
					'type' => [ 'sometimes' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$hospitalDocument->update( $validator->validated() );
			$hospitalDocument->Load( [ 'hospital' ] );
			return $this->success( new HospitalDocumentResource( $hospitalDocument ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$hospitalDocument = HospitalDocument::findOrFail( $id );
			$this->checkResourceOwner( $hospitalDocument->hospital->user->id );
			$hospitalDocument->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	public function updateHospitalFile( string $id, Request $request ) {
		try {
			$this->pr( $id );
			$hospitalDocument = HospitalDocument::findOrFail( $id );
			$validator = Validator::make(
				$request->all(),
				[ 
					'type' => [ 'required' ],
					'file' => [ 'required', File::types( mimetypes: [ 'doc', 'pdf' ] ) ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'file' ) ) {
				$path = $request->file( 'file' )->store( 'hospital/files', 'public' );
				$path = "storage/$path";
			}
			$hospitalDocument->update(
				collect( $validator->validated() )
					->merge( [ 'file' => $path ] )->toArray()
			);
			$hospitalDocument->Load( [ 'hospital' ] );
			return $this->success( new HospitalDocumentResource( $hospitalDocument ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
