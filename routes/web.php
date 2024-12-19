<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\MedicalProviders;

Route::get('/', function () {

    return view('web.index');
})->name('home');
Route::resource('/providers',MedicalProviders::class);
