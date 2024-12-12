<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Exception;

class NotAuthorizedException extends Exception {
	use ApiResponse;
	public function __construct( public array $errors, string $message = "Validation Failed", int $code = 0, \Throwable $previous = null ) {
		parent::__construct( $message, $code, $previous );
	}
	public function report() {
	}
	public function render( $request ) {
		return $this->failure( $this->getMessage(), $this->errors );
	}
}
