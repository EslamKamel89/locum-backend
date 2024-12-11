<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\DistrictController;
use App\Http\Controllers\api\DoctorController;
use App\Http\Controllers\api\DoctorDocumentController;
use App\Http\Controllers\api\DoctorInfoController;
use App\Http\Controllers\api\HospitalController;
use App\Http\Controllers\api\HospitalDocumentController;
use App\Http\Controllers\api\HospitalInfoController;
use App\Http\Controllers\api\JobAddController;
use App\Http\Controllers\api\JobApplicationController;
use App\Http\Controllers\api\JobInfoController;
use App\Http\Controllers\api\LangController;
use App\Http\Controllers\api\SkillController;
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

Route::middleware( [ 'auth:sanctum' ] )->group( function () {
	Route::apiResource( '/langs', LangController::class); //
	Route::apiResource( '/skills', SkillController::class); //
	Route::post( '/doctors/update-user-img/{doctor}', [ DoctorController::class, 'updateUserImg' ] );
	Route::apiResource( '/doctors', DoctorController::class); //
	Route::post( '/doctors/update-doctor-cv/{doctor}', [ DoctorInfoController::class, 'updateDoctorCv' ] );
	Route::apiResource( '/doctor-infos', DoctorInfoController::class);
	Route::post( '/doctor-docs/update-doctor-file/{doctor}', [ DoctorDocumentController::class, 'updateDoctorFile' ] );
	Route::apiResource( '/doctor-docs', DoctorDocumentController::class);
	Route::post( '/hospitals/update-hospital-img/{hospital}', [ HospitalController::class, 'updateHospitalImg' ] );
	Route::apiResource( '/hospitals', HospitalController::class);//
	Route::apiResource( '/hospital-infos', HospitalInfoController::class);
	Route::post( '/hosptial-docs/update-hospital-file/{hospital}', [ HospitalDocumentController::class, 'updateHospitalFile' ] );
	Route::apiResource( '/hospital-docs', HospitalDocumentController::class);
	Route::apiResource( '/job-add', JobAddController::class); //
	Route::apiResource( '/job-applications', JobApplicationController::class); //

} );
