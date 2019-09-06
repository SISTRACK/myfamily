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

Route::prefix('government')->name('government.')->group(function() {
	Route::prefix('analysis')
    ->namespace('Analysis')
    ->name('analysis.')
    ->group(function() {
        //population statistict routes
        Route::prefix('population')->name('population.')->group(function() {
            Route::get('/', 'PopulationController@index')->name('index');  
            Route::post('/search', 'PopulationController@search')->name('search');  
            Route::get('/result', 'PopulationController@showResult')->name('result');  
        });
        //birth statistics routes
        Route::prefix('births')->name('birth.')->group(function() {
            Route::get('/', 'BirthController@index')->name('index');  
            Route::post('/search', 'BirthController@search')->name('search');  
            Route::get('/result', 'BirthController@showResult')->name('result');  
        });
        //marriages statistics routes
        Route::prefix('marriages')->name('marriage.')->group(function() {
            Route::get('/', 'MarriageController@index')->name('index');  
            Route::post('/search', 'MarriageController@search')->name('search');  
            Route::get('/result', 'MarriageController@showResult')->name('result');  
        });
        //health statistics routes
        Route::prefix('health')
        ->namespace('Health')
        ->name('health.')
        ->group(function() {
            //infections statistics
            Route::prefix('infection')
            ->name('infection.')
            ->group(function() {
                Route::get('/', 'InfectionController@index')->name('index');  
                Route::post('/search', 'InfectionController@search')->name('search');  
                Route::get('/result', 'InfectionController@showResult')->name('result');
            });
            //hospital admission statistics
            Route::prefix('admission')
            ->name('admission.')
            ->group(function() {
                Route::get('/', 'AdmissionController@index')->name('index');  
                Route::post('/search', 'AdmissionController@search')->name('search');  
                Route::get('/result', 'AdmissionController@showResult')->name('result');
            });
            //hospital discharge statistics
            Route::prefix('admission/discharge')
            ->name('admission.discharge.')
            ->group(function() {
                Route::get('/', 'DischargeController@index')->name('index');  
                Route::post('/search', 'DischargeController@search')->name('search');  
                Route::get('/result', 'DischargeController@showResult')->name('result');
            });
            //hospital death statistics
            Route::prefix('admission/death')
            ->name('admission.death.')
            ->group(function() {
                Route::get('/', 'HospitalDeathController@index')->name('index');  
                Route::post('/search', 'HospitalDeathController@search')->name('search');  
                Route::get('/result', 'HospitalDeathController@showResult')->name('result');
            });
            //hospital birth statistics
            Route::prefix('admission/birth')
            ->name('admission.birth.')
            ->group(function() {
                Route::get('/', 'HospitalBirthController@index')->name('index');  
                Route::post('/search', 'HospitalBirthController@search')->name('search');  
                Route::get('/result', 'HospitalBirthController@showResult')->name('result');
            });  
        });
    });
    Route::get('/', 'GovernmentController@verify')->name('government');
    Route::get('/dashboard', 'GovernmentController@index')->name('dashboard');
    Route::get('/login', 'Auth\GovernmentLoginController@login')->name('auth.login');
    Route::post('/login', 'Auth\GovernmentLoginController@loginGovernment')->name('login');
    Route::post('logout', 'Auth\GovernmentLoginController@logout')->name('auth.logout');
    Route::get('report/{state}/population', 'ChartController@population')->name('population');
    //health report routes
    Route::get('report/health/polio', 'ChartController@polio')->name('report.polio');
    Route::get('report/health/malaria', 'ChartController@malaria')->name('report.malaria');
    Route::get('report/health/tv', 'ChartController@tv')->name('report.tv');
    Route::get('report/health/hiv', 'ChartController@hiv')->name('report.hiv');
    Route::get('report/health/diabetes', 'ChartController@diabetes')->name('report.diabetes');

    //educational report route
    Route::get('report/education/primary', 'ChartController@primary')->name('report.primary');
    Route::get('report/education/secondary', 'ChartController@secondary')->name('report.secondary');
    Route::get('report/education/college-of-education', 'ChartController@coe')->name('report.coe');
    Route::get('report/education/polytechnic', 'ChartController@poly')->name('report.poly');
    Route::get('report/education/school-of-nursing', 'ChartController@nursing')->name('report.nursing');
    Route::get('report/education/universities', 'ChartController@university')->name('report.university');

    //social report route

    Route::get('report/social/marriages', 'ChartController@marriage')->name('report.marriage');
    Route::get('report/social/accidents', 'ChartController@accident')->name('report.accident');
    Route::get('report/social/deaths', 'ChartController@death')->name('report.death');
    Route::get('report/social/divorce', 'ChartController@divorce')->name('report.divorce');
    Route::get('report/social/births', 'ChartController@birth')->name('report.birth');

});
