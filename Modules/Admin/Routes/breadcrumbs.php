<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('admin.dashboard'));
});

Breadcrumbs::for('admin.state.dashboard', function ($trail,$state) {
	
    $trail->parent('admin.dashboard');
    $trail->push($state->name.' State', route('state.dashboard',[$state->name,$state->id]));
});

Breadcrumbs::for('admin.lga.dashboard', function ($trail,$lga) {
	if(admin()->role_id == 1 || admin()->state){
	    $trail->parent('admin.state.dashboard',$lga->state);
	}else{
        $trail->parent('admin.dashboard');
    }
    $trail->push($lga->name.' Lga', route('lga.dashboard',[
    	$lga->state->name,
    	$lga->name,
    	$lga->id
    ]));
});

Breadcrumbs::for('admin.district.dashboard', function ($trail,$district) {
	if(admin()->role_id == 1 || admin()->lga || admin()->state){
		$trail->parent('admin.lga.dashboard', $district->lga);
	}else{
        $trail->parent('admin.dashboard');
    }
    $trail->push($district->name.' District', route('district.dashboard',[
    	$district->lga->state->name,
    	$district->lga->name,
    	$district->name,
    	$district->id
    ]));
});

Breadcrumbs::for('admin.district.family.create', function ($trail,$district) {
    $trail->parent('admin.district.dashboard', $district);
    $trail->push('Create Family', route('district.dashboard',[
    	$district->lga->state->name,
    	$district->lga->name,
    	$district->name,
    	$district->id
    ]));
});

Breadcrumbs::for('admin.district.family.edit', function ($trail,$family) {
	$district = $family->location->town->district;
    $trail->parent('admin.district.dashboard', $district);
    $trail->push('Edit Family Registration', route('district.family.edit',[
    	$district->lga->state->name,
    	$district->lga->name,
    	$district->name,
    	$family->name,
    	$family->id
    ]));
});

Breadcrumbs::for('admin.district.family.marriage.create', function ($trail,$district) {
    $trail->parent('admin.district.dashboard', $district);
    if(session('family')){
    	$page = 'New Marriage';
    }else{
    	$page = 'Select Family Account';
    }
    $trail->push($page, route('district.marriages.create',[
    	$district->lga->state->name,
    	$district->lga->name,
    	$district->name,
    	$district->id
    ]));
});

Breadcrumbs::for('admin.district.family.marriage.edit', function ($trail,$marriage) {
	$district = $marriage->husband->profile->family->location->town->district;
    $trail->parent('admin.district.dashboard', $district);
    $trail->push('Edit Marriage Registration', route('district.family.marriage.edit', [
    	$district->lga->state->name,
    	$district->lga->name,
    	$district->name,
    	$family->name,
    	$marriage->id
    ]));
});

Breadcrumbs::for('admin.district.family.death.create', function ($trail,$district) {
    $trail->parent('admin.district.dashboard', $district);
    if(session('death')){
    	$page = 'Register New Death';
    }else{
    	$page = 'Select Family And Member Category';
    }
    $trail->push($page, route('district.deaths.create',[
    	$district->lga->state->name,
    	$district->lga->name,
    	$district->name,
    	$district->id
    ]));
});

Breadcrumbs::for('admin.district.family.death.edit', function ($trail,$death) {
	$district = $death->profile->family->location->town->district;
    $trail->parent('admin.district.dashboard', $district);
    $trail->push('Edit Death Registration', route('district.family.death.edit', [
    	$district->lga->state->name,
    	$district->lga->name,
    	$district->name,
    	$death->profile->family->name,
    	$death->id
    ]));
});

//birth breadcrumbs

Breadcrumbs::for('admin.district.family.birth.create', function ($trail,$district) {
    $trail->parent('admin.district.dashboard', $district);
    if(session('family')){
    	$page = 'Register New Birth';
    }else{
    	$page = 'Select Family To Register Birth';
    }
    $trail->push($page, route('district.deaths.create',[
    	$district->lga->state->name,
    	$district->lga->name,
    	$district->name,
    	$district->id
    ]));
});

Breadcrumbs::for('admin.district.family.birth.edit', function ($trail,$birth) {
	$district = $birth->father->husband->profile->family->location->town->district;
    $trail->parent('admin.district.dashboard', $district);
    $trail->push('Edit Birth Registration', route('district.family.birth.edit', [
    	$district->lga->state->name,
    	$district->lga->name,
    	$district->name,
    	$birth->father->husband->profile->family->name,
    	$birth->id
    ]));
});

Breadcrumbs::for('admin.search.relative.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Search Relative', route('admin.search.relative.index'));
});

Breadcrumbs::for('admin.search.identity.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Search Identity', route('admin.search.identity.index'));
});

Breadcrumbs::for('admin.search.relative.profiles', function ($trail,$profiles) {
    $trail->parent('admin.search.relative.index');
    $trail->push('Profiles', route('admin.search.relative.available.profiles','hello'));
});

Breadcrumbs::for('admin.search.identity.profiles', function ($trail,$profiles) {
    $trail->parent('admin.search.identity.index');
    $trail->push('Profiles', route('admin.search.identity.available.profiles','hello'));
});
Breadcrumbs::for('admin.search.identity.generation', function ($trail,$profile, $profiles) {
    $trail->parent('admin.search.identity.profiles',$profiles);
    $trail->push('Generation', route('admin.search.identity.available.profiles',strtolower($profile->user->first_name.'-'.$profile->user->last_name)));
});
Breadcrumbs::for('admin.search.identity.generation.result', function ($trail,$profile,$profiles) {
    $trail->parent('admin.search.identity.generation',$profile, $profiles);
    $trail->push('Result', route('admin.search.identity.available.profiles',strtolower($profile->user->first_name.'-'.$profile->user->last_name)));
});
Breadcrumbs::for('admin.search.relative.results', function ($trail, $profile, $profiles, $search) {
    $trail->parent('admin.search.relative.profiles', $profiles);
    $trail->push($profile->user->first_name.' '.$profile->user->last_name, route('admin.search.relative.available.profiles',strtolower($profile->user->first_name.'-'.$profile->user->last_name)));
    $trail->push('Results', route('admin.search.relative.result',strtolower($profile->user->first_name.'-'.$profile->user->last_name)));
});