<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CommentController;
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
use App\Http\Controllers\api\MessageController;
use App\Http\Controllers\api\SkillController;
use App\Http\Controllers\api\SpecialtyController;
use App\Http\Controllers\api\StateController;
use App\Http\Controllers\api\UniversityController;
use App\Http\Controllers\Controller;
use App\Models\JobAdd;
use App\Models\User;
use App\Services\NotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get( '/user', function (Request $request) {
	return $request->user();
} )->middleware( 'auth:sanctum' );


Route::get( '/test',
	function (Request $request, Controller $controller, NotificationService $notificationService): JsonResponse {
		$email = $request->email;
		$userId = null;
		if ( $email ) {
			$user = User::where( 'email', $email )->first();
			$userId = $user?->id;
		}
		$notificationService->sendNotification(
			$userId ?? 101,
			'test notification laravel',
			'hello from laravel',
			'/doctorJobDetailsScreen',
			[ 'id' => 1 ]
		);
		return $controller->success( [] );
	} );
Route::get( '/test2',
	function (Request $request, Controller $controller, NotificationService $notificationService): JsonResponse {
		$notificationService->sendNotifications(
			[ "cgN8w_fLT-aZ8-93wXHKZF:APA91bGQLFav_7PW8RSXLePLDfaJwZ5IyBYj_58FOrz1p7t-9Tzo30BjBQ9Z0UHHg1UhcR62iXGiD1FVIUIa1hqOW693MgsGB7YRwidgp_E0fKMFKhCjw_Q" ],
			'test notification laravel',
			'hello from laravel',
			'/doctorJobDetailsScreen',
			[ 'id' => 1 ]
		);
		return $controller->success( [] );
	} );
Route::apiResource( '/states', StateController::class);
Route::apiResource( '/districts', DistrictController::class);
Route::prefix( 'auth' )->group( function () {
	Route::post( '/login', [ AuthController::class, 'login' ] );
	Route::post( '/register', [ AuthController::class, 'register' ] );
	Route::post( '/social', [ AuthController::class, 'socialAuth' ] );
} );

Route::middleware( [ 'auth:sanctum' ] )->group( function () {
	Route::get( '/auth/user', [ AuthController::class, 'userInfo' ] );
	Route::post( '/auth/user', [ AuthController::class, 'update' ] );
	Route::apiResource( '/universities', UniversityController::class);
	Route::apiResource( '/specialties', SpecialtyController::class);
	Route::apiResource( '/jobinfo', JobInfoController::class);
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
	Route::apiResource( '/comments', CommentController::class); //
	Route::prefix( '/message' )->group( function () {
		Route::post( '/send-message', [ MessageController::class, 'sendMessage' ] );
		Route::get( '/all-chat', [ MessageController::class, 'getAllChatsForUser' ] );
		Route::get( '/chat', [ MessageController::class, 'getChat' ] );
		Route::get( '/unseen-count', [ MessageController::class, 'getUnSeenCount' ] );
	} );

} );
