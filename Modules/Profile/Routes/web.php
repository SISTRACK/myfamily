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

Route::middleware(['hasProfile'])->prefix('{family}/profile')->group(function() {
    Route::get('/{profile_id}/home', 'ProfileController@index')->name('family.member.profile');
    Route::get('/{profile_id}/setting', 'ProfileController@setting')->name('family.member.profile.setting');
    Route::post('/{profile_id}/update', 'ProfileController@update')->name('family.member.profile.update');

    Route::get('/{profile_id}/view', 'ProfileController@accessProfile')->name('family.member.profile.view');
	Route::get('/{profile_id}/resume', 'ProfileController@resumeProfile')->name('family.member.profile.resume');
	Route::get('/{profile_id}/block/access', 'ProfileController@blockProfileAccess')->name('family.member.profile.block.access');
    
});
   
Route::get('/profile/api/{id}','ProfileController@api');