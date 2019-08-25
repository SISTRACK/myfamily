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

Route::prefix('health')->name('health.')->group(function() {
    //doctors routes
    Route::prefix('doctor')->name('doctor.')->group(function() {
        //patient routes
        Route::prefix('patient')->name('patient.')->group(function() {
           Route::get('/', 'PatientController@index')->name('index');
           Route::post('/profile/verify','PatientController@verify')->name('profile.verify');
           Route::post('/admission/register','PatientController@admitPatient')->name('admit');
        });
    });
    Route::get('/dashboard', 'HealthController@index')->name('dasboard');
    Route::get('/', 'HealthController@verify');
    Route::get('/dashboard', 'HealthController@index')->name('dashboard');
    Route::get('/login', 'Auth\HealthLoginController@login')->name('auth.login');
    Route::post('/login', 'Auth\HealthLoginController@loginHealth')->name('login');
    Route::post('logout', 'Auth\HealthLoginController@logout')->name('auth.logout');
});

//health administration routes

Route::prefix('admin/health/')->middleware('auth:admin')->group(function() {

    
    Route::prefix('hospitals/')->group(function() {

	    Route::get('/', 'HospitalController@index')->name('admin.health.hospital.index');

	    Route::get('create', 'HospitalController@create')->name('admin.health.hospital.create');

	    Route::post('register', 'HospitalController@register')->name('admin.health.hospital.register');

	    Route::post('{hospita_id}/update', 'HospitalController@update')->name('admin.health.hospital.update');

	    Route::get('{hospita_id}/delete', 'HospitalController@deleteHospital')->name('admin.health.hospital.delete');
    });

    Route::prefix('doctors/')->group(function() {


	    Route::get('/', 'DoctorController@index')->name('admin.health.doctor.index');

	    Route::get('create', 'DoctorController@create')->name('admin.health.doctor.create');

	    Route::post('register', 'DoctorController@register')->name('admin.health.doctor.register');

	    Route::post('{doctor_id}/update', 'DoctorController@updateThisDoctor')->name('admin.health.doctor.update');

	    Route::get('{doctor_id}/delete', 'DoctorController@deleteDoctor')->name('admin.health.doctor.delete');
	    

    });

});
