<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return $this->success( State::select( 'id', 'name' )->get() );

	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store( Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'name' => [ 'required', 'unique:states,name' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$state = State::create( $validator->validated() );
			return $this->success( $state );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$state = State::findOrFail( $id );
			return $this->success( $state );
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
			$state = State::findOrFail( $id );
			$state->update( $request->only( 'name' ) );
			return $this->success( $state );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$state = State::findOrFail( $id );
			$state->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
