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

Route::prefix('event')->middleware(['auth','hasFamily'])->group(function() {
    Route::get('/', 'EventController@index');
    Route::get('/create', 'EventController@create')->name('event.create');
    Route::get('/attend', 'EventController@attend')->name('attend.event');
    Route::get('/might_attend', 'EventController@mightAttend')->name('might_attend.event');
    Route::post('/register', 'EventController@store')->name('event.register');
});
