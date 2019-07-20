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

Route::prefix('{family}/gallary/')->group(function() {
    Route::get('{category}/album/{album_type}/{album_name}/{album_id}/show', 'GallaryController@showAlbum')->name('album.show');
    Route::get('/', 'GallaryController@index')->name('gallary.index');
    Route::get('private','GallaryController@privateIndex')->name('family.gallary.private.index');
    Route::get('nuclear','GallaryController@nuclearIndex')->name('family.gallary.nuclear.index');
    Route::get('extended','GallaryController@extendedIndex')->name('family.gallary.extended.index');


    Route::post('album/create','GallaryController@createAlbum')->name('album.create');
	Route::post('album/{type}/upload','GallaryController@upload')->name('album.upload');
	Route::post('album/{type}/delete','GallaryController@delete')->name('album.delete');
	Route::post('album/{type}/grant-access','GallaryController@grantAccess')->name('album.access');
	Route::post('album/{type}/published','GallaryController@published')->name('album.published');
	Route::post('album/{type}/info-update','GallaryController@update')->name('album.update');
});






