<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/patients',[
    'uses' => 'PatientController@getPatients'
]);
Route::get('/rdvs',[
    'uses' => 'RdvController@getNext'
]);
Route::get('/rdv/{date}',[
    'uses' => 'RdvController@getDayRdv'
]);
Route::post('/rapport',[
    'uses' => 'RapportController@downloadRapport'
]);

Route::post('/ordonnance',[
    'uses' => 'RapportController@downloadOrdonnance'
]);
Route::post('/send-mail',[
    'uses' => 'PatientController@sendMail'
]);
