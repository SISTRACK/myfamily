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


Route::prefix('admin')->middleware('admin')->group(function () {
  Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('login', 'Auth\AdminLoginController@login')->name('admin.auth.login');
  Route::post('login', 'Auth\AdminLoginController@loginAdmin')->name('admin.login');
  Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');
});
