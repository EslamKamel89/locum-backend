<?php

namespace App\Http\Controllers\api;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\District;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
			collect( $user )
				->merge( [ 'token' => $user->createToken( $user->email )->plainTextToken ] ),
			message: 'Login Completed Successfully' );
	}
	public function register( Request $request ) {
		$validator = Validator::make(
			$request->all(),
			[ 
				'name' => 'required',
				'email' => 'required|email|unique:users,email',
				'password' => 'required',
				'state_id' => 'required|exists:states,id',
				'district_id' => 'sometimes|exists:districts,id',
				'type' => [ 'required', Rule::enum( UserType::class) ]
			] );

		if ( $validator->fails() ) {
			return $this->handleValidation( $validator );
		}
		$validateRegister = $this->validateRegister( $validator );
		if ( $validateRegister['fails'] ) {
			return $validateRegister['response'];
		}
		$user = User::create( $validator->validated() );

		return $this->success(
			collect( $user )
				->merge( [ 'token' => $user->createToken( $user->email )->plainTextToken ] ),
			message: 'Register Completed Successfully' );
	}

	protected function validateRegister( $validator ) {
		$validated = $validator->validated();
		if ( isset( $validated['district_id'] ) ) {
			$district = District::find( $validated['district_id'] );
			if ( $district->state_id != $validated['state_id'] ) {
				return [ 
					'fails' => true,
					'response' => $this->failure( "The District with id {$validated['district_id']} don't belong to this state with id {$validated['state_id']}" )
				];
			}
		}
		return [ 'fails' => false ];

	}


	public function userInfo() {
		$user = auth()->user()->load( [ 'district', 'state',] );

		if ( $user->type == 'doctor' ) {
			$user->load( [ 
				'doctor.doctorInfo.university',
				'doctor.doctorDocuments',
				'doctor.skills',
				'doctor.langs',
				'doctor.specialty',
				'doctor.jobInfo',
			] );
		} else {
			$user->load( [ 
				'hospital.hospitalInfo',
				'hospital.hospitalDocuments',

			] );
		}
		return $this->success( [ 
			'type' => $user->type,
			'user' => $user,
		] );
	}

	public function update( Request $request ) {
		try {
			$validator = Validator::make(
				$request->all(),
				[ 
					'name' => 'required',
					'email' => [ 
						'required',
						'email',
						Rule::unique( 'users', 'email' )->ignore( auth()->id() )
					],
					'password' => 'sometimes|nullable',
					'state_id' => 'required|exists:states,id',
					'district_id' => 'sometimes|exists:districts,id',
				] );
			if ( $validator->fails() ) {
				return $this->handleValidation( $validator );
			}
			$user = auth()->user();
			$user->update(
				collect( $validator->validated() )
					->reject( fn( $value, $key ) => $key === 'password' && ( $value === null || $value === '' ) )
					->toArray()
			);
			return $this->success( $user );
		} catch (\Exception $e) {
			return $this->handleException( $e );
		}
	}
}
