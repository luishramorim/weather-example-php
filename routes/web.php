<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController; 

// Redirect the root URL ("/") to "/weather"
Route::get('/', function () {
    return redirect('/weather');
});

// Route to display the weather page using WeatherController@index
Route::get('/weather', [WeatherController::class, 'index']);
