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
    Route::get('/', 'HealthController@index')->name('health.dasboard');
    Route::post('/view/patient/profile','HealthController@view')->name('view.patient.profile');
    Route::post('/append/patient/file','HealthController@appendFile')->name('append.patient.file');

    Route::get('/', 'HealthController@verify')->name('health');
    Route::get('/dashboard', 'HealthController@index')->name('health.dashboard');
    Route::get('/login', 'Auth\HealthLoginController@login')->name('health.auth.login');
    Route::post('/login', 'Auth\HealthLoginController@loginHealth')->name('health.login');
    Route::post('logout', 'Auth\HealthLoginController@logout')->name('health.auth.logout');
});


