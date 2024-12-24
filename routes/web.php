<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\StateController;

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

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});