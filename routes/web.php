<?php

use App\Http\Controllers\web\FacilityControlller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\MedicalProviders;

Route::get('/', function () {

    return view('web.index');
})->name('home');
Route::resource('/providers',MedicalProviders::class);
Route::resource('/facilities',FacilityControlller::class);


require __DIR__.'/ajax.php';
