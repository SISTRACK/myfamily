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


Route::prefix('admin')->group(function () {
  Route::get('/', 'AdminController@verify')->name('admin');
  Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard')->middleware('landOnGeneral');
  Route::get('/login', 'Auth\AdminLoginController@login')->name('admin.auth.login');
  Route::post('/login', 'Auth\AdminLoginController@loginAdmin')->name('admin.login');
  Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');

  Route::get('/{state}/lga/{lga}/dashboard', 'AdminController@lgaDashboard')->name('lga.dashboard')->middleware('landOnLga');

  Route::get('/{state}/{state_id}/dashboard', 'AdminController@stateDashboard')->name('state.dashboard')->middleware('landOnState');

  Route::get('/{state}/{lga}/district/{district}/dashboard', 'AdminController@districtDashboard')->name('district.dashboard')->middleware('landOnDistrict');

});
