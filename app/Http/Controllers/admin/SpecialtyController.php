<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialtyController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return $this->success( Specialty::select( 'id', 'name' )->get() );
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store( Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'name' => [ 'required' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$speciality = Specialty::create( $validator->validated() );
			return $this->success( $speciality );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$speciality = Specialty::findOrFail( $id );
			return $this->success( $speciality );
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
					'name' => [ 'required' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$speciality = Specialty::findOrFail( $id );
			$speciality->update( $request->only( 'name' ) );
			return $this->success( $speciality );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$speciality = Specialty::findOrFail( $id );
			$speciality->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
