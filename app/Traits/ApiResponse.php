<?php

namespace App\Traits;

trait ApiResponse {
	public function customResponse( $data, $status, $message, $errors, $statusCode ) {
		return [ 
			'data' => $data,
			'status' => $status,
			'message' => $message,
			'errors' => $errors,
			'statusCode' => $statusCode,
		];
	}
	public function success( $data, $statusCode = 200, $status = 'success', $message = 'success', $errors = [], $additionalData = null ) {
		if ( $additionalData != null ) {
			$data = collect( $data )->merge( $additionalData );
		}
		$response = $this->customResponse( $data, $status, $message, $errors, $statusCode );

		return response()->json( $response, $statusCode );
	}
	public function failure( $message = 'failure', $errors = [], $statusCode = 404, $data = [], $status = 'failure', ) {
		return response()->json(
			$this->customResponse( $data, $status, $message, $errors, $statusCode ),
			$statusCode );
	}

}


