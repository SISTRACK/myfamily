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

Route::prefix('{family}/divorce')->group(function() {
    Route::get('/create', 'DivorceController@index')->name('family.divorce.create');
    Route::get('/wife', 'DivorceController@divorce')->name('family.wife.divorce');
    Route::get('/return', 'DivorceController@return')->name('family.divorce.return');
    Route::post('/register', 'DivorceController@divorceStore')->name('family.divorce.register');
    Route::post('/return/register', 'DivorceController@returnStore')->name('family.wife.divorce.return');
});
