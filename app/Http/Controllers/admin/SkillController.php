<?php

namespace App\Http\Controllers\admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class SkillController extends Controller {
	/**
	 * Display a listing of the resource.
	 */
	public function index() {
		return $this->success( Skill::select( 'id', 'name' )->get() );

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
			$skill = Skill::create( $validator->validated() );
			return $this->success( $skill );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}

	/**
	 * Display the specified resource.
	 */
	public function show( string $id ) {
		try {
			$skill = Skill::findOrFail( $id );
			return $this->success( $skill );
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
			$skill = Skill::findOrFail( $id );
			$skill->update( $request->only( 'name' ) );
			return $this->success( $skill );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy( string $id ) {
		try {
			$skill = Skill::findOrFail( $id );
			$skill->delete();
			return $this->success( [], message: 'Resource Deleted Successfully' );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
