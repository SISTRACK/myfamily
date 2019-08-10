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

Route::prefix('admin/security/')->group(function() {

    Route::prefix('court/')->group(function() {

	    Route::get('/', 'Admin\Court\CourtController@index')->name('admin.security.court.index');

	    Route::get('create', 'Admin\Court\CourtController@create')->name('admin.security.court.create');

	    Route::post('register', 'Admin\Court\CourtController@register')->name('admin.security.court.register');

	    Route::post('{court_id}/update', 'Admin\Court\CourtController@update')->name('admin.security.court.update');

	    Route::get('{court_id}/delete', 'Admin\Court\CourtController@delete')->name('admin.security.court.delete');


	    Route::prefix('user-agent/')->group(function() {

		    Route::get('/', 'Admin\Court\CourtSecurityController@index')->name('admin.security.court.user.index');

		    Route::get('create', 'Admin\Court\CourtSecurityController@create')->name('admin.security.court.user.create');

		    Route::post('register', 'Admin\Court\CourtSecurityController@register')->name('admin.security.court.user.register');

		    Route::post('{court_id}/update', 'Admin\Court\CourtSecurityController@update')->name('admin.security.court.user.update');

		    Route::get('{court_id}/delete', 'Admin\Court\CourtSecurityController@delete')->name('admin.security.court.user.delete');

	    });

    });



    Route::prefix('police-station/')->group(function() {


	    Route::get('/', 'Admin\Police\PoliceStationController@index')->name('admin.security.police.station.index');

	    Route::get('create', 'Admin\Police\PoliceStationController@create')->name('admin.security.police.station.create');

	    Route::post('register', 'Admin\Police\PoliceStationController@register')->name('admin.security.police.station.register');

	    Route::post('{police_station_id}/update', 'Admin\Police\PoliceStationController@update')->name('admin.security.police.station.update');

	    Route::get('{police_station_id}/delete', 'Admin\Police\PoliceStationController@delete')->name('admin.security.police.station.delete');

	    Route::prefix('user-agent/')->group(function() {

		    Route::get('/', 'Admin\Police\PoliceSecurityController@index')->name('admin.security.police.station.user.index');

		    Route::get('create', 'Admin\Police\PoliceSecurityController@create')->name('admin.security.police.station.user.create');

		    Route::post('register', 'Admin\Police\PoliceSecurityController@register')->name('admin.security.police.station.user.register');

		    Route::post('{police_station_id}/update', 'Admin\Police\PoliceSecurityController@update')->name('admin.security.police.station.user.update');

		    Route::get('{police_station_id}/delete', 'Admin\Police\PoliceSecurityController@delete')->name('admin.security.police.station.user.delete');

	    });
	    
    });

});