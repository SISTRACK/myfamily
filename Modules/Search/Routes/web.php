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

Route::prefix('search')->group(function() {
    Route::get('/', 'SearchController@index');
});

Route::get('/search_relative', 'SearchController@relative')->name('search.relative.index');

Route::get('/search_identity', 'SearchController@identity')->name('search.identity.index');

Route::post('/search', 'SearchController@store')->name('search');

Route::get('/search_result', 'SearchController@result')->name('search.result');

Route::post('/search/generation', 'SearchController@getGenerations')->name('search.generation');

