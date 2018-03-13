<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('home', function () {
    return 'hola';
});

Route::resource('estudiante', 'EstudianteController');

Route::get('home', function () {
    return 'hola';
});

Route::get('home', function () {
    return 'hola';
});

Route::post('login', 'EstudianteController@authenticate');

Route::get('upload','EstudianteController@imageUpload');

Route::post('pupload','EstudianteController@imageUploadPost');
