<?php

Breadcrumbs::for('family.birth.create', function ($breadcrumbs, $family) {
	    $page = 'Select Family To Register Birth';
	if(session('family')){
		$page = 'Birth Registration';
	}
    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push($page, route('family.birth.create', $family));
});