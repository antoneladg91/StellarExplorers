<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanetController;

Route::get('/', function () {
    return redirect()->route('planets.index');
});

Route::resource('planets', PlanetController::class);

