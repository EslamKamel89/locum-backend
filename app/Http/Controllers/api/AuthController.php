<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
	public function login( Request $request ) {
		$validator = Validator::make(
			$request->all(),
			[ 
				'email' => 'required|email',
				'password' => 'required',
			] );

		if ( $validator->fails() ) {
			return $this->handleValidation( $validator );
		}

		$user = User::where( 'email', $request->email )->first();

		if ( ! $user || ! Hash::check( $request->password, $user->password ) ) {
			return $this->failure( 'The provided credentials are incorrect.' );
		}
		return $this->success(
			[ 
				'token' => $user->createToken( $user->email )->plainTextToken
			],
			message: 'Login Completed Successfully' );
	}
	public function register( Request $request ) {
		$validator = Validator::make(
			$request->all(),
			[ 
				'name' => 'required',
				'email' => 'required|email|unique:users,email',
				'password' => 'required',
			] );

		if ( $validator->fails() ) {
			return $this->handleValidation( $validator );
		}

		$user = User::create( $validator->validated() );


		return $this->success(
			[ 
				'token' => $user->createToken( $user->email )->plainTextToken,
				'user' => $user,
			],
			message: 'Register Completed Successfully' );
	}
}
