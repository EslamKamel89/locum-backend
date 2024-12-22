<?php

use App\Http\Controllers\ajax\CityController;
use Illuminate\Support\Facades\Route;

Route::resource('ajax/cities',CityController::class);



?>
