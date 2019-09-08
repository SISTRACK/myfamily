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
	Route::prefix('analysis/')
    ->namespace('Analysis')
    ->name('analysis.')
    ->group(function() {
         
        //social routes
        Route::prefix('social')
        ->namespace('Social')
        ->name('social.')
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
            //other socila related routes group here
        });

        //health statistics routes
        Route::prefix('health')
        ->namespace('Health')
        ->name('health.')
        ->group(function() {
            // hospital routes group
            Route::prefix('hospital')
            ->namespace('Hospital')
            ->name('hospital.')
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
                //other hospital related routes here  
            });
            //other heath related routes groups here  
        });

        //educational routes group
        Route::prefix('education')
        ->namespace('Education')
        ->name('education.')
        ->group(function() {
            //school route group
            Route::prefix('school')
            ->namespace('School')
            ->name('school.')
            ->group(function() {
                //school admissions statistics
                Route::prefix('admission/')
                ->name('admission.')
                ->group(function() {
                    Route::get('/', 'AdmissionController@index')->name('index');  
                    Route::post('/search', 'AdmissionController@search')->name('search');  
                    Route::get('/result', 'AdmissionController@showResult')->name('result');
                });
                //school graduation statistics
                Route::prefix('graduation')
                ->name('graduation.')
                ->group(function() {
                    Route::get('/', 'GraduationController@index')->name('index');  
                    Route::post('/search', 'GraduationController@search')->name('search');  
                    Route::get('/result', 'GraduationController@showResult')->name('result');
                });
                //school report statistics
                Route::prefix('student-report')
                ->name('student.report.')
                ->group(function() {
                    Route::get('/', 'StudentReportController@index')->name('index');  
                    Route::post('/search', 'StudentReportController@search')->name('search');  
                    Route::get('/result', 'StudentReportController@showResult')->name('result');
                });
                //other school related routes here
            });
            //other educational related route group here
        });
    });
    Route::get('/', 'GovernmentController@verify')->name('government');
    Route::get('/dashboard', 'GovernmentController@index')->name('dashboard');
    Route::get('/login', 'Auth\GovernmentLoginController@login')->name('auth.login');
    Route::post('/login', 'Auth\GovernmentLoginController@loginGovernment')->name('login');
    Route::post('logout', 'Auth\GovernmentLoginController@logout')->name('auth.logout');
});
