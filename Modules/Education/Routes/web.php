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

Route::prefix('education')->group(function() {
    Route::get('/', 'EducationController@verify')->name('education');
    Route::get('/dashboard', 'EducationController@index')->name('education.dashboard');
    Route::get('/login', 'Auth\EducationLoginController@login')->name('education.auth.login');
    Route::post('/login', 'Auth\EducationLoginController@loginEducation')->name('education.login');
    Route::post('logout', 'Auth\EducationLoginController@logout')->name('education.auth.logout');
});

Route::prefix('admin/education/')->namespace('Admin')->group(function(){
	//school crude route
	Route::prefix('school')->namespace('School')->group(function(){
		Route::get('/', 'SchoolController@index')->name('admin.education.school.index');
	    Route::get('/create', 'SchoolController@create')->name('admin.education.school.create');
	    Route::post('/register', 'SchoolController@register')->name('admin.education.school.register');
	    Route::post('/{school_id}/update', 'SchoolController@update')->name('admin.education.school.update');
	    Route::post('/{school_id/delete}', 'SchoolController@delete')->name('admin.education.school.delete');
	});
    //teachers crude routes
    Route::prefix('teacher')->namespace('Teacher')->group(function(){
		Route::get('/', 'TeacherController@index')->name('admin.education.school.teacher.index');
	    Route::get('/create', 'TeacherController@create')->name('admin.education.school.teacher.create');
	    Route::post('/register', 'TeacherController@register')->name('admin.education.school.teacher.register');
	    Route::post('/{teacher_id}/update', 'TeacherController@update')->name('admin.education.school.teacher.update');
	    Route::post('/{teacher_id/delete}', 'TeacherController@delete')->name('admin.education.school.teacher.delete');
	});
});
