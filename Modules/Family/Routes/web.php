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

Route::prefix('family')->middleware('auth')->group(function() {
    Route::get('/', 'FamilyController@index');
    Route::middleware(['hasFamily','used'])->group(function() {

	    Route::post('/account/register', 'FamilyController@store')->name('family.store');
	    Route::get('/create/account', 'FamilyController@create')->name('family.create');
    });
    
});
