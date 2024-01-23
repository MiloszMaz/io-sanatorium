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

Route::get('/home', function () {
    return view('home');
});

Route::get('/komunikat', 'App\Http\Controllers\HomeController@komunikat');

Route::group(['prefix' => 'user'], function () {
    Route::get('login', 'App\Http\Controllers\UserController@login')->name('login');
    Route::post('auth', 'App\Http\Controllers\UserController@auth')->name('auth');
    Route::get('logout', 'App\Http\Controllers\UserController@logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'pacjent'], function () {
        Route::get('', 'App\Http\Controllers\PacjentController@index')->name('pacjenci');
        Route::get('/rejestracja', 'App\Http\Controllers\PacjentController@rejestracja')->name('pacjenci/rejestracja');
        Route::any('/sprawdz-dostepnosc-terminow', 'App\Http\Controllers\PacjentController@sprawdzDostepnoscTerminow')->name('pacjenci/rejestracja');
        Route::get('/lista-pacjentow', 'App\Http\Controllers\PacjentController@listaPacjentow');
        Route::get('/rejestracja-pacjenta', 'App\Http\Controllers\PacjentController@rejestracjaPacjenta');
        Route::post('/rejestruj-w-systemie', 'App\Http\Controllers\PacjentController@rejestrujWSystemie');
    });
});
