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

Route::prefix('forum')->group(function() {
    Route::get('/', 'ForumController@index');
});

Route::get('/extended_forum', 'ForumController@extended')->name('extended.forum.index');
Route::get('/nuclear_forum', 'ForumController@nuclear')->name('nuclear.forum.index');

Route::post('/nuclear/message/send', 'ForumController@sendNuclearMessage')->name('extended.message.send');
Route::post('/extended/message/send', 'ForumController@sendExtendedMessage')->name('nuclear.message.send');

