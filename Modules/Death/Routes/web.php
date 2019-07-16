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

Route::prefix('{family}/death')->middleware(['auth'])->group(function() {
    Route::get('/create', 'DeathController@index')->name('family.death.create');
    Route::post('/family/verify', 'DeathController@verify')->name('family.death.family.verify');
    Route::post('/register', 'DeathController@store')->name('family.death.register');
});
