<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Renderer\Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Validator;

abstract class Controller {
	use ApiResponse;
	public function pr( $value, $title = null ) {
		return \App\Pr::_( $value, $title );
	}
	public function handleValidation( Validator $validator ): JsonResponse {
		return $this->failure(
			message: 'Validation Failed',
			errors: $validator->errors(),
			statusCode: 422
		);
	}
	public function handleException( \Exception $e ): JsonResponse {
		if ( $e instanceof ModelNotFoundException ) {
			return $this->failure( 'Resoruce Not Found ', [ $e->getMessage() ], 404 );
		}
		return $this->failure( 'Unkown Error ', [ $e->getMessage() ], 404 );
	}

}
