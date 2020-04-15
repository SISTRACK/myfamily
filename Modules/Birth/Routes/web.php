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

Route::prefix('birth/{family}/')->middleware(['auth'])->group(function() {
    Route::get('{familyId}/create', 'BirthController@index')->name('family.birth.create');
    Route::post('/register','BirthController@store')->name('family.birth.register');
    Route::post('/verify','BirthController@verify')->name('family.birth.family.verify');
});
