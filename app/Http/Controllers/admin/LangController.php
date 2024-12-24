<?php

namespace App\Http\Controllers\admin;

use App\Models\Lang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class LangController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return $this->success( Lang::select( 'id', 'name' )->get() );

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
			$lang = Lang::create( $validator->validated() );
			return $this->success( $lang );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$lang = Lang::findOrFail( $id );
			return $this->success( $lang );
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
			$lang = Lang::findOrFail( $id );
			$lang->update( $request->only( 'name' ) );
			return $this->success( $lang );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$lang = Lang::findOrFail( $id );
			$lang->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
