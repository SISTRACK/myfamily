<?php

Breadcrumbs::for('family.death.create', function ($breadcrumbs, $family) {
    $breadcrumbs->parent('family.dashboard');
    $page = 'Select Family And Category';
    if(session('death')){
    	$page = 'Register Death';
    }
    $breadcrumbs->push($page, route('family.death.create', $family));
});