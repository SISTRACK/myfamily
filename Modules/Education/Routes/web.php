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
    Route::get('/school/dashboard', 'EducationController@index')->name('education.dashboard');
    Route::get('/login', 'Auth\EducationLoginController@login')->name('education.auth.login');
    Route::post('/login', 'Auth\EducationLoginController@loginEducation')->name('education.login');
    Route::post('logout', 'Auth\EducationLoginController@logout')->name('education.auth.logout');

    
    Route::prefix('school')->name('education.school.')->group(function() {

    	//school chart routes
        Route::prefix('statistics-chart-of')->name('chart.')->group(function() {
		    Route::get('/graduation', 'ChartController@graduation')->name('graduation');
		    Route::get('/admission', 'ChartController@admission')->name('admission');
		    Route::get('/report', 'ChartController@report')->name('report');
	    });

	    //school admission routes
	    Route::prefix('{year}/admission/')
	    ->namespace('School')
	    ->name('admission.')
	    ->group(function() {
		    Route::get('show', 'AdmissionController@index')->name('index');
		    Route::get('create', 'AdmissionController@create')->name('create');
		    Route::post('{admission_id}/update', 'AdmissionController@update')->name('update');
		    Route::post('register', 'AdmissionController@store')->name('register');
		    Route::get('delete', 'AdmissionController@delete')->name('delete');
		});

		//school gradutaion routes
	    Route::prefix('{year}/graduation/')
	    ->namespace('School')
	    ->name('graduation.')
	    ->group(function() {
		    Route::get('show', 'GraduationController@index')->name('index');
		    Route::get('create', 'GraduationController@create')->name('create');
		    Route::post('{graduation_id}/update', 'GraduationController@update')->name('update');
		    Route::post('register', 'GraduationController@store')->name('register');
		    Route::get('{graduation_id}/delete', 'GraduationController@delete')->name('delete');
		});

        //school school report routes
	    Route::prefix('{year}/student-school-report/')
	    ->namespace('School')
	    ->name('report.')
	    ->group(function() {
		    Route::get('show', 'ReportController@index')->name('index');
		    Route::get('create', 'ReportController@create')->name('create');
		    Route::post('{report_id}/update', 'ReportController@update')->name('update');
		    Route::post('register', 'ReportController@store')->name('register');
		    Route::get('{report_id}/delete', 'ReportController@delete')->name('delete');
		});
	    
	});

});

Route::prefix('admin/education/')->namespace('Admin')->group(function(){


	//school crude route
	Route::prefix('school')->namespace('School')->group(function(){
		//school crude
		Route::get('/{school_id}/index', 'SchoolController@index')->name('admin.education.school.index');

	    Route::get('/create', 'SchoolController@create')->name('admin.education.school.create');

	    Route::post('/register', 'SchoolController@register')->name('admin.education.school.register');

	    Route::post('/{school_id}/update', 'SchoolController@update')->name('admin.education.school.update');

	    Route::get('/{school_id}/delete', 'SchoolController@delete')->name('admin.education.school.delete');

        //school category indexs
	    Route::get('/nursery', 'SchoolController@nurseryIndex')->name('admin.education.school.nursery.index');

	    Route::get('/primary', 'SchoolController@primaryIndex')->name('admin.education.school.primary.index');

	    Route::get('/secondary', 'SchoolController@secondaryIndex')->name('admin.education.school.secondary.index');

	});

    //teachers crude routes
    Route::prefix('schools')->namespace('Teacher')->group(function(){
        //index
    	Route::get('/nursery/teachers', 'TeacherController@nurseryIndex')->name('admin.education.school.teacher.nursery.index');

	    Route::get('/primary/teachers', 'TeacherController@primaryIndex')->name('admin.education.school.teacher.primary.index');

	    Route::get('/secondary/teachers', 'TeacherController@secondaryIndex')->name('admin.education.school.teacher.secondary.index');

        //crude
		Route::get('/{school_id}/teachers/index', 'TeacherController@index')->name('admin.education.school.teacher.index');

	    Route::get('/teacher/create', 'TeacherController@create')->name('admin.education.school.teacher.create');

	    Route::post('/register', 'TeacherController@register')->name('admin.education.school.teacher.register');

	    Route::post('/{teacher_id}/update', 'TeacherController@update')->name('admin.education.school.teacher.update');

	    Route::get('/{teacher_id}/delete', 'TeacherController@delete')->name('admin.education.school.teacher.delete');
	});
});
