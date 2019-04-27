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


    Route::get('/event', 'EventController@index')->name('event.index');
    Route::get('/create_event', 'EventController@create')->name('event.create');
    Route::post('/register_event', 'EventController@store')->name('event.register');
	Route::get('event/{id}/attend', 'EventController@attend');
	Route::get('event/{id}/might_attend', 'EventController@mightAttend');