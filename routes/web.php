<?php

use Illuminate\Support\Facades\Route;



// interfaces privé
Route::group(['middleware' => 'auth','prefix'=>'admin'], function () {
   Route::get('/','HomeController@index')->name('dashbord');
   Route::get('/patient/ajouter','PatientController@create')->name('patient.create');
   Route::get('/patient/{id}', 'PatientController@index')->name('patient');
   Route::get('/patient/{id}/details', 'PatientController@detail')->name('patient.detail');
   Route::post('/patient/{id}/update','PatientController@update')->name('patient.update');
   Route::post('/patient/store','PatientController@store')->name('patient.store');
   Route::post('/patient/{id}/delete', 'PatientController@destroy')->name('patient.delete');
   Route::post('/patient/{id}/update-delete', 'PatientController@updateDetails')->name('patient.update-details');
   Route::get('/rapport','RapportController@createRapport')->name('rapport.create');
   Route::get('/ordonnance','RapportController@createOrdonnance')->name('ordonnance.create');
   Route::get('/rendez-vous','RdvController@index')->name('rendez-vous-page');
   Route::get('/rendez-vous/delete/{id}','RdvController@destroy')->name('rdv.delete');
});


// interfaces public
Route::post('/rdv/create','RdvController@create')->name('rdv.create');
Route::get('/',function() { return view('pages.accueil');})->name('accueil');

// interface d'authentification
Auth::routes();


