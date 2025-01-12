<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\HealthcareMiddleware;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\LangController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\JobAddController;
use App\Http\Controllers\admin\JobInfoController;
use App\Http\Controllers\admin\DistrictController;
use App\Http\Controllers\admin\HospitalController;
use App\Http\Controllers\admin\SpecialtyController;
use App\Http\Controllers\admin\DoctorInfoController;
use App\Http\Controllers\admin\JobApplicationController;
use App\Http\Controllers\healthcare\Auth\WebAuthController;
use App\Http\Controllers\healthcare\HealthcareAddsController;
use App\Http\Controllers\healthcare\HealthcareProfileController;
use App\Http\Controllers\healthcare\HealthcareApplicationController;
use App\Http\Controllers\hospital\HospitalController as HospitalHospitalController;

Route::get( '/', function () {
	return view( 'welcome' );
} );

// General Routes
Route::resource( '/states', StateController::class);
Route::resource( '/districts', DistrictController::class);
Route::resource( '/skills', SkillController::class);
Route::resource( '/langs', LangController::class);
Route::resource( '/specialties', SpecialtyController::class);
Route::resource( '/job_infos', JobInfoController::class);

Route::resource( '/doctors', DoctorController::class);
Route::resource( '/hospitals', HospitalController::class);
Route::resource( '/jobApplications', JobApplicationController::class);

// Dashboard Routes
Route::get( '/admin/login', [ AuthController::class, 'loginForm' ] )->name( 'admin.login' );
// Route::get( '/admin/login', [ AuthController::class, 'loginForm' ] )->name( 'login' );
Route::post( '/admin/login', [ AuthController::class, 'login' ] )->name( 'admin.login.post' );

Route::middleware( [ AdminMiddleware::class] )->prefix( 'admin' )->name( 'admin.' )->group( function () {
	Route::get( '/', function () {
		return view( 'admin.dashboard' );
	} )->name( 'dashboard' );

	Route::resource( '/states', StateController::class);
	Route::resource( '/districts', DistrictController::class);
	Route::resource( '/skills', SkillController::class);
	Route::resource( '/langs', LangController::class);
	Route::resource( '/specialties', SpecialtyController::class);
	Route::resource( '/job_infos', JobInfoController::class);

	Route::resource( '/doctors', DoctorController::class);
	Route::resource( '/doctor-info', DoctorInfoController::class);
	Route::resource( '/hospitals', HospitalController::class);
	Route::resource( '/jobApplications', JobApplicationController::class);
	Route::resource( '/job-adds', JobAddController::class);

	Route::get( '/logout', [ AuthController::class, 'logout' ] )->name( 'logout' );
} );

// Healthcare Routes
Route::prefix('healthcare')->name('healthcare.')->group(function () {
    Route::middleware(['auth:web'])->group(function () {
        Route::get('/', [HealthcareProfileController::class, 'index'])->name('dashboard');
        Route::put('/update-profile/{id}', [HealthcareProfileController::class, 'update'])->name('update-profile');
        Route::resource('/applications', HealthcareApplicationController::class);
        Route::resource('/adds', HealthcareAddsController::class);
        Route::get('/get-job-by-status/{status}', [HealthcareAddsController::class, 'getJobByStatus'])->name('get-job-by-status');
        Route::resource('/job-add', JobAddController::class);
    });
});
