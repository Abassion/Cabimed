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


Route::group(['middleware' => 'auth'], function () {
   Route::get('/patient/ajouter','PatientController@create')->name('patient.create');
   Route::get('/patient/{id}', 'PatientController@index')->name('patient');
   Route::get('/patient/{id}/details', 'PatientController@detail')->name('patient.detail');
   Route::post('/patient/{id}/update','PatientController@update')->name('patient.update');
   Route::get('/','HomeController@index')->name('dashbord');
   Route::post('/patient/store','PatientController@store')->name('patient.store');
   Route::post('/patient/{id}/delete', 'PatientController@destroy')->name('patient.delete');
   Route::post('/patient/{id}/update-delete', 'PatientController@updateDetails')->name('patient.update-details');
   Route::get('/rapport','RapportController@createRapport')->name('rapport.create');
   Route::get('/ordonnance','RapportController@createOrdonnance')->name('ordonnance.create');
});



Auth::routes();

