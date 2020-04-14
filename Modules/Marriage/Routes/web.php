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

Route::prefix('marriage/')->group(function() {
	Route::get('family/{familyId}/{status}/create', 'MarriageController@index')->name('family.marriage.create');
    Route::post('{family}/register', 'MarriageController@store')->name('family.marriage.register');
    Route::post('{family}/verify', 'MarriageController@verify')->name('family.marriage.verify');
});

