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
        Route::get('lista-pacjentow', 'App\Http\Controllers\PacjentController@index')->name('pacjenci');
        Route::get('/rejestracja', 'App\Http\Controllers\PacjentController@rejestracja')->name('pacjenci/rejestracja');
        Route::any('/sprawdz-dostepnosc-terminow', 'App\Http\Controllers\PacjentController@sprawdzDostepnoscTerminow')->name('pacjenci/sprawdz-termin');
        Route::get('/rejestracja-pacjenta', 'App\Http\Controllers\PacjentController@rejestracjaPacjenta')->name('pacjenci/rejestracja-pacjenta');
        Route::post('/rejestruj-w-systemie', 'App\Http\Controllers\PacjentController@rejestrujWSystemie')->name('pacjenci/rejestrujWSystemie');
        Route::get('/edycja/{pacjent}', 'App\Http\Controllers\PacjentController@edytuj')->name('pacjenci/edycja');
        Route::post('/zapisz/{pacjent}', 'App\Http\Controllers\PacjentController@zapisz')->name('pacjenci/zapisz');
        Route::get('/usun/{pacjent}', 'App\Http\Controllers\PacjentController@usun')->name('pacjenci/usun');
    });

    Route::group(['prefix' => 'personel'], function () {
        Route::get('lista-personelu', 'App\Http\Controllers\PersonelMedycznyController@index')->name('personel');
        Route::get('/listaAkcji', 'App\Http\Controllers\PersonelMedycznyController@listaAkcji')->name('personel/listaAkcji');
        Route::get('/formularz', 'App\Http\Controllers\PersonelMedycznyController@formularz')->name('personel/formularz');
        Route::post('/stworz', 'App\Http\Controllers\PersonelMedycznyController@stworz')->name('personel/stworz');
        Route::get('/edycja/{personel}', 'App\Http\Controllers\PersonelMedycznyController@edytuj')->name('personel/edycja');
        Route::post('/zapisz/{personel}', 'App\Http\Controllers\PersonelMedycznyController@zapisz')->name('personel/zapisz');
        Route::get('/usun/{personel}', 'App\Http\Controllers\PersonelMedycznyController@usun')->name('personel/usun');
    });
});
