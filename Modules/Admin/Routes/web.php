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

  Route::get('/{state}/{lga}/{district}/{id}/family/create', 'Registration\FamilyController@createFamily')->name('district.family.create')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/{id}/family/register', 'Registration\FamilyController@registerFamily')->name('district.family.register')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/family/{id}/update-changes', 'Registration\FamilyController@updateFamily')->name('district.family.update')->middleware('landOnDistrict');

  Route::get('/{state}/{lga}/{district}/family/{id}/edit', 'Registration\FamilyController@editFamily')->name('district.family.edit')->middleware('landOnDistrict');

  Route::get('/{state}/{lga}/{district}/family/{id}/delete', 'Registration\FamilyController@destroyFamily')->name('district.family.delete')->middleware('landOnDistrict');

});
