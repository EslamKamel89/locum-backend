<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\LangController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\StateController;
use App\Http\Controllers\admin\DoctorController;
use App\Http\Controllers\admin\JobInfoController;
use App\Http\Controllers\admin\DistrictController;
use App\Http\Controllers\admin\HospitalController;
use App\Http\Controllers\admin\JobApplicationController;
use App\Http\Controllers\admin\SpecialtyController;

Route::get('/', function () {
    return view('welcome');
});


// Dashboard Routes
Route::get('/admin/login', [AuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::middleware([AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('/states', StateController::class);
    Route::resource('/districts', DistrictController::class);
    Route::resource('/skills', SkillController::class);
    Route::resource('/langs', LangController::class);
    Route::resource('/specialties', SpecialtyController::class);
    Route::resource('/job_infos', JobInfoController::class);

    Route::resource('/doctors', DoctorController::class);
    Route::resource('/hospitals', HospitalController::class);
    Route::resource('/jobApplications', JobApplicationController::class);

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Healthcare Routes
// Route::get('/healthcare/register', [AuthController::class, 'healthcare_register'])->name('healthcare.register');
// Route::group(['prefix' => 'healthcare'], function () {
//     Route::get('/', function () {
//         return view('healthcare.index');
//     })->name('healthcare.index');
// });