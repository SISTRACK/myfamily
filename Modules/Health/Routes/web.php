<?php

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

Route::prefix('health')->group(function() {
    Route::get('/', 'HealthController@index');
});

Route::post('/view_patient_profile','HealthController@view')->name('view.patient.profile');

Route::post('/append_patient_file','HealthController@appendFile')->name('append.patient.file');
