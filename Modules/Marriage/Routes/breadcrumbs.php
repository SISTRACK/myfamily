<?php

Breadcrumbs::for('family.marriage.create', function ($breadcrumbs, $family) {
	    $page = 'Select Family To Register Marriage';
	if(session('register')){
		$page = 'Marriage Registration';
	}
    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push($page, route('family.marriage.create', $family));
});