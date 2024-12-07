<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DistrictController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index( Request $request ) {
		$validator = Validator::make(
			$request->all(),
			[ 
				'state_id' => [ 'required', Rule::exists( 'states', 'id' ) ],
			] );
		if ( $validator->fails() ) {
			return $this->handleValidation( $validator );
		}
		$stateId = $validator->validated()['state_id'];
		$state = State::find( $stateId );
		$districts = District::select( 'id', 'name' )
			->where( 'state_id', $stateId )
			->get();
		$result = [ 
			'state_name' => $state->name,
			'districts' => $districts,
		];
		return $this->success( $result );

	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store( Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'state_id' => [ 'required', Rule::exists( 'states', 'id' ) ],
					'name' => [ 'required' ],
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$district = District::create( $validator->validated() );
			return $this->success( $district );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$district = District::findOrFail( $id )->load( 'state' );
			return $this->success( $district
			);
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

			$district = District::findOrFail( $id );

			$district->update( $request->only( 'name' ) );
			return $this->success( $district );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$district = District::findOrFail( $id );
			$district->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
