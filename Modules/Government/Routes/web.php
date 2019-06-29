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

Route::prefix('government')->group(function() {
	
    Route::get('/', 'GovernmentController@verify')->name('government');
    Route::get('/dashboard', 'GovernmentController@index')->name('government.dashboard');
    Route::get('/login', 'Auth\GovernmentLoginController@login')->name('government.auth.login');
    Route::post('/login', 'Auth\GovernmentLoginController@loginGovernment')->name('government.login');
    Route::post('logout', 'Auth\GovernmentLoginController@logout')->name('government.auth.logout');

    Route::get('report/health/polio', 'ChartController@polio')->name('report.polio');
    Route::get('report/health/malaria', 'ChartController@malaria')->name('report.malaria');
    Route::get('report/health/tv', 'ChartController@tv')->name('report.tv');
    Route::get('report/health/hiv', 'ChartController@hiv')->name('report.hiv');
    Route::get('report/health/diabetes', 'ChartController@diabetes')->name('report.diabetes');

});
