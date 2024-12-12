<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\DoctorDocumentResource;
use App\Models\DoctorDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
class DoctorDocumentController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		$doctorDocuments = request()->has( 'limit' ) ?
			DoctorDocument::paginate( request()->get( 'limit' ) ?? 10 ) :
			DoctorDocument::all();
		return $this->success(
			DoctorDocumentResource::collection( $doctorDocuments ),
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
					'file' => [ 'required', File::types( mimetypes: [ 'doc', 'pdf' ] ) ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$path = null;
			if ( $request->hasFile( 'file' ) ) {
				$path = $request->file( 'file' )->store( 'doctor/files', 'public' );
				$path = "storage/$path";
			}
			$doctorDocument = DoctorDocument::create(
				collect( $validator->validated() )
					->merge( [ 
						'doctor_id' => auth()->user()->doctor->id,
						'file' => $path,
					] )->toArray()
			);
			return $this->success( new DoctorDocumentResource( $doctorDocument ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$doctorDocument = DoctorDocument::findOrFail( $id );
			$doctorDocument->Load( [ 'doctor' ] );
			return $this->success( new DoctorDocumentResource( $doctorDocument ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}



	/**
	 * Update the specified resource in storage.
	 */
	public function update( Request $request, string $id ) {
		try {
			$doctorDocument = DoctorDocument::findOrFail( $id );
			$this->checkResourceOwner( $doctorDocument->doctor->user->id );
			$validator = Validator::make(
				$request->all(),
				[ 
					'type' => [ 'sometimes' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$doctorDocument->update( $validator->validated() );
			$doctorDocument->Load( [ 'doctor' ] );
			return $this->success( new DoctorDocumentResource( $doctorDocument ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$doctorDocument = DoctorDocument::findOrFail( $id );
			$this->checkResourceOwner( $doctorDocument->doctor->user->id );
			$doctorDocument->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	public function updateDoctorFile( string $id, Request $request ) {
		try {
			$doctorDocument = DoctorDocument::findOrFail( $id );
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
				$path = $request->file( 'file' )->store( 'doctor/files', 'public' );
				$path = "storage/$path";
			}
			$doctorDocument->update(
				collect( $validator->validated() )
					->merge( [ 'file' => $path ] )->toArray()
			);
			$doctorDocument->Load( [ 'doctor' ] );
			return $this->success( new DoctorDocumentResource( $doctorDocument ) );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
