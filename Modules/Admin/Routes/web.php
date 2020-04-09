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
  Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('/login', 'Auth\AdminLoginController@login')->name('admin.auth.login');
  Route::post('/login', 'Auth\AdminLoginController@loginAdmin')->name('admin.login');
  Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');

  Route::get('/{state}/{lga}/{lga_id}/dashboard', 'AdminController@lgaDashboard')->name('lga.dashboard')->middleware('landOnLga');

  Route::get('/{state}/{state_id}/dashboard', 'AdminController@stateDashboard')->name('state.dashboard')->middleware('landOnState');

  Route::get('/{state}/{lga}/{district}/{district_id}/dashboard', 'AdminController@districtDashboard')->name('district.dashboard')->middleware('landOnDistrict');
  //districts routes
  Route::prefix('/{state}/{lga}/{district}/{district_id}/')
  ->name('admin.state.lga.district.')
  ->namespace('Admin\State\Lga\District')
  ->group(function () {
    Route::get('/births', 'BirthController@index')->name('births.index');
    Route::get('/profiles', 'ProfileController@index')->name('profiles.index');
    Route::get('/profiles', 'FamilyController@index')->name('families.index');
  });

  //local government routes
  Route::prefix('{state}/')
  ->middleware('landOnLga')
  ->name('admin.lga.')
  ->namespace('Admin')
  ->group(function () {
      Route::post('local-government/create', 'LgaController@register')->name('create');
      Route::post('{lga}/district/create', 'DistrictController@register')->name('district.create');
      Route::post('{lga}/{district}/village/create', 'TownController@register')->name('district.town.create');
  });

 //administrative family crude

  Route::get('/{state}/{lga}/{district}/{district_id}/family/create', 'Registration\FamilyController@createFamily')->name('district.family.create')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/{district_id}/family/register', 'Registration\FamilyController@registerFamily')->name('district.family.register')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/family/{id}/update-changes', 'Registration\FamilyController@updateFamily')->name('district.family.update')->middleware('landOnDistrict');

  Route::get('/{state}/{lga}/{district}/family/{id}/edit', 'Registration\FamilyController@editFamily')->name('district.family.edit')->middleware('landOnDistrict');

  Route::get('/{state}/{lga}/{district}/family/{id}/delete', 'Registration\FamilyController@destroyFamily')->name('district.family.delete')->middleware('landOnDistrict');

  // Marriage administration

  Route::get('/{state}/{lga}/{district}/{district_id}/marriages/create', 'Registration\MarriageController@createMarriage')->name('district.marriages.create')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/{district_id}/marriages/verify-family', 'Registration\MarriageController@verifyMarriageFamily')->name('district.marriage.family.verify')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/family/{family_id}marriage/register-family', 'Registration\MarriageController@registerMarriage')->name('district.family.marriage.register')->middleware('landOnDistrict');

  Route::get('/{state}/{lga}/{district}/{town}/{family}/marriage/{marriage_id}/edit', 'Registration\MarriageController@editMarriage')->name('district.family.marriage.edit')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/{town}/{family}/marriage/{marriage_id}/update', 'Registration\MarriageController@updateMarriage')->name('district.family.marriage.update')->middleware('landOnDistrict');

  //birth administration
  Route::get('/{state}/{lga}/{district}/{district_id}/birth/create', 'Registration\BirthController@createBirth')->name('district.births.create')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/{district_id}/birth/verify-family', 'Registration\BirthController@verifyFamily')->name('district.births.verify.family')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/{family}/{family_id}/birth/register', 'Registration\BirthController@registerBirth')->name('district.family.birth.register')->middleware('landOnDistrict');

  Route::get('/{state}/{lga}/{district}/{family}/birth/{birth_id}/edit', 'Registration\BirthController@editBirth')->name('district.family.birth.edit')->middleware('landOnDistrict');

  Route::post('/{state}/{lga}/{district}/{family}/birth/{birth_id}/update', 'Registration\BirthController@updateBirth')->name('district.family.birth.update')->middleware('landOnDistrict');

  //Death routes
   Route::get('/{state}/{lga}/{district}/{district_id}/death/create', 'Registration\DeathController@createDeath')->name('district.deaths.create')->middleware('landOnDistrict');

   Route::post('/{state}/{lga}/{district}/{district_id}/death/family/verify', 'Registration\DeathController@verifyFamily')->name('district.death.family.verify')->middleware('landOnDistrict');

   Route::post('/{state}/{lga}/{district}/{district_id}/family/death/register', 'Registration\DeathController@registerDeath')->name('district.family.death.register')->middleware('landOnDistrict');

   Route::get('/{state}/{lga}/{district}/{family}/death/{death_id}/edit', 'Registration\DeathController@editDeath')->name('district.family.death.edit')->middleware('landOnDistrict');

   Route::post('/{state}/{lga}/{district}/{family}/death/{death_id}/update', 'Registration\DeathController@updateDeath')->name('district.family.death.update')->middleware('landOnDistrict');

   //admin search routes
  Route::prefix('/search/')->middleware('admin')->group(function () {

    Route::get('identity', 'Search\IdentityController@index')->name('admin.search.identity.index');

    Route::get('relative', 'Search\RelativeController@index')->name('admin.search.relative.index');

    Route::get('relative/{search_of}/{search_for?}/results', 'Search\RelativeController@result')->name('admin.search.relative.result');

    Route::get('relative/{search_of}/available/profiles', 'Search\RelativeController@availableSearchProfile')->name('admin.search.relative.available.profiles');

    Route::post('relative/available-profiles', 'Search\RelativeController@searchProfiles')->name('admin.search.relative.profiles');

    Route::post('relative', 'Search\RelativeController@search')->name('admin.search.relative');

    Route::get('identity/{search_of}/{search_for?}/results', 'Search\IdentityController@result')->name('admin.search.identity.result');

    Route::get('identity/{search_of}/available/profiles', 'Search\IdentityController@availableSearchProfile')->name('admin.search.identity.available.profiles');

    Route::post('identity/{search_of}/generation', 'Search\IdentityController@generationIndex')->name('admin.search.identity.generation.index');

    Route::post('identity/{search_of}/generation/results', 'Search\IdentityController@generationSearch')->name('admin.search.identity.generation.search');

    Route::post('identity/available-profiles', 'Search\IdentityController@searchProfiles')->name('admin.search.identity.profiles');

    Route::post('identity', 'Search\IdentityController@search')->name('admin.search.identity');
    
    
    
  });
  // configuration routes
  Route::prefix('/configuration/')->middleware('admin')->group(function () {
    // profiles configuration routes
    Route::prefix('profile')->group(function () {

      Route::get('/', 'Configuration\ProfileController@index')->name('admin.config.profile.index');

      Route::post('/show', 'Configuration\ProfileController@showProfile')->name('admin.config.profile.show');

      Route::get('/{profile_id}/show', 'Configuration\ProfileController@showThisProfile')->name('admin.config.user.profile');

      Route::get('/{profile_id}/guest/show', 'Configuration\ProfileController@showThisProfileAsGues')->name('admin.config.gues.profile');

      Route::get('/{profile_id}/setting', 'Configuration\ProfileController@setting')->name('admin.config.profile.setting');

      Route::post('/{profile_id}/update', 'Configuration\ProfileController@update')->name('admin.config.profile.update');

      Route::get('/{profile_id}/view', 'Configuration\ProfileController@accessProfile')->name('admin.config.profile.view');

      Route::get('/{profile_id}/resume', 'Configuration\ProfileController@resumeProfile')->name('admin.config.profile.resume');

      Route::get('/{profile_id}/block/access', 'Configuration\ProfileController@blockProfileAccess')->name('admin.config.profile.block.access');
    });
    Route::prefix('family')->group(function () {

      Route::get('/father/child/family/marge', 'Configuration\FamilyController@margeIndex')->name('admin.config.father.child.family.marge');

      Route::get('/father/child/family/marge/verify/father', 'Configuration\FamilyController@verifyMotherBaseOnFamily')->name('admin.config.father.child.family.marge.verify.father');

      Route::get('/father/child/family/marge/birth', 'Configuration\FamilyController@newBirth')->name('admin.config.father.child.family.marge.birth');

      Route::post('/father/child/family/marge/verify', 'Configuration\FamilyController@verifyMargeFamilies')->name('admin.config.father.child.family.verify');

      Route::post('/father/child/family/marge/verify/mother', 'Configuration\FamilyController@verifyMother')->name('admin.config.father.child.family.verify.mother');

      Route::post('/father/child/family/marge/register', 'Configuration\FamilyController@marge')->name('admin.config.father.child.family.marge.register');
    });
  });
  
});
