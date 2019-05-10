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

Route::middleware(['auth','web','hasProfile'])->group(function() {
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::get('/profile_setting', 'ProfileController@setting')->name('profile.setting');
    Route::get('/profile_details', 'ProfileController@userDetail')->name('user.detail');
    Route::post('/update_profile', 'ProfileController@update')->name('profile.update');
});

Route::get('/profile/{id}/view', 'ProfileController@accessProfile');
Route::get('/profile/{id}/resume', 'ProfileController@resumeProfile');
Route::get('/profile/{id}/block_access', 'ProfileController@blockProfileAccess');
