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
    Route::get('/attend_event', 'EventController@attend')->name('attend.event');
    Route::get('/might_attend_event', 'EventController@mightAttend')->name('might_attend.event');
    Route::post('/register_event', 'EventController@store')->name('event.register');

