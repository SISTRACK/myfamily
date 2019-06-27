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
