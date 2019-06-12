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

Route::prefix('gallary')->group(function() {
    Route::get('/', 'GallaryController@index');
});

Route::get('private_gallary','GallaryController@privateIndex')->name('private.gallary.index');
Route::get('nuclear_gallary','GallaryController@nuclearIndex')->name('nuclear.gallary.index');
Route::get('extended_gallary','GallaryController@extendedIndex')->name('extended.gallary.index');
Route::post('gallary/album/create','GallaryController@createAlbum')->name('album.create');
Route::post('gallary/album/{type}/upload','GallaryController@upload')->name('upload');

