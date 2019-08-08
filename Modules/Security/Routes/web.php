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

Route::prefix('security')->group(function() {
    
    Route::get('/', 'SecurityController@verify')->name('security');
    Route::get('/dashboard', 'SecurityController@index')->name('security.dashboard');
    Route::get('/login', 'Auth\SecurityLoginController@login')->name('security.auth.login');
    Route::post('/login', 'Auth\SecurityLoginController@loginSecurity')->name('security.login');
    Route::post('logout', 'Auth\SecurityLoginController@logout')->name('security.auth.logout');
});

Route::prefix('admin/security/')->middleware('auth:admin')->group(function() {

    
    Route::prefix('court/')->group(function() {

	    Route::get('/', 'Admin/CourtController@index')->name('admin.security.court.index');

	    Route::get('create', 'Admin/CourtController@create')->name('admin.security.court.create');

	    Route::post('register', 'Admin/CourtController@register')->name('admin.security.court.register');

	    Route::post('{court_id}/update', 'Admin/CourtController@update')->name('admin.security.court.update');

	    Route::get('{court_id}/delete', 'Admin/CourtController@delete')->name('admin.security.court.delete');

    });

    Route::prefix('police-station/')->group(function() {


	    Route::get('/', 'Admin/PoliceStationController@index')->name('admin.security.police.station.index');

	    Route::get('create', 'Admin/PoliceStationController@create')->name('admin.health.police.station.create');

	    Route::post('register', 'Admin/PoliceStationController@register')->name('admin.security.police.station.register');

	    Route::post('{police_station_id}/update', 'Admin/PoliceStationController@update')->name('admin.security.police.station.update');

	    Route::get('{police_station_id}/delete', 'Admin/PoliceStationController@delete')->name('admin.security.police.station.delete');
	    
    });

});