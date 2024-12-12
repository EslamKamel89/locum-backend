<?php

use App\Exceptions\NotAuthorizedException;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\App;


return Application::configure( basePath: dirname( __DIR__ ) )
	->withRouting(
		web: __DIR__ . '/../routes/web.php',
		api: __DIR__ . '/../routes/api.php',
		commands: __DIR__ . '/../routes/console.php',
		health: '/up',
	)
	->withMiddleware( function (Middleware $middleware) {

	} )
	->withExceptions( function (Exceptions $exceptions) {

		$exceptions->render( function (NotFoundHttpException $e) {
			return ( new Controller() )->failure( 'Resource Not Found' );
		} );
		$exceptions->render( function (ValidationException $e) {
			$errors = collect( [] );
			collect( $e->errors() )
				->each(
					fn( $error ) => $errors->add( $error[0] )
				);
			return ( new Controller() )->failure(
				message: 'Validation Failed',
				errors: $errors,
				statusCode: 422
			);

		} );
		$exceptions->render( function (AuthenticationException $e) {
			return ( new Controller() )->failure( 'Unauthenticated User', statusCode: 401 );
		} );
		$exceptions->render( function (AccessDeniedHttpException $e) {
			return ( new Controller() )->failure( 'This action is unauthorized.', statusCode: 403 );
		} );
		$exceptions->render( function (NotAuthorizedException $e) {
			return ( new Controller() )->failure( $e->getMessage(), $e->errors );
		} );
	} )->create();
