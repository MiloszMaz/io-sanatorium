<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/login', 'App\Http\Controllers\UserController@login');
    Route::post('/auth', 'App\Http\Controllers\UserController@auth');
    Route::get('/logout', 'App\Http\Controllers\UserController@logout');
});

Route::group(['prefix' => 'pacjent'], function () {
    Route::get('/rejestracja', 'App\Http\Controllers\PacjentController@rejestracja');
    Route::any('/sprawdz-dostepnosc-terminow', 'App\Http\Controllers\PacjentController@sprawdzDostepnoscTerminow');
    Route::get('/lista-pacjentow', 'App\Http\Controllers\PacjentController@listaPacjentow');


    Route::get('/rejestracja-pacjenta', 'App\Http\Controllers\PacjentController@rejestracjaPacjenta');
    Route::post('/rejestruj-w-systemie', 'App\Http\Controllers\PacjentController@rejestrujWSystemie');
});
