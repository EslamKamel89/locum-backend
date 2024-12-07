<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DistrictController;
use App\Http\Controllers\api\JobInfoController;
use App\Http\Controllers\api\SpecialtyController;
use App\Http\Controllers\api\StateController;
use App\Http\Controllers\api\UniversityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get( '/user', function (Request $request) {
	return $request->user();
} )->middleware( 'auth:sanctum' );

Route::apiResource( '/specialties', SpecialtyController::class);
Route::apiResource( '/states', StateController::class);
Route::apiResource( '/districts', DistrictController::class);
Route::apiResource( '/universities', UniversityController::class);
Route::apiResource( '/jobinfo', JobInfoController::class);
Route::prefix( 'auth' )->group( function () {
	Route::post( '/login', [ AuthController::class, 'login' ] );
	Route::post( '/register', [ AuthController::class, 'register' ] );
} );

