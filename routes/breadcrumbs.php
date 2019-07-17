<?php

require __DIR__ . '/../Modules/Admin/Routes/breadcrumbs.php';
require __DIR__ . '/../Modules/Marriage/Routes/breadcrumbs.php';
require __DIR__ . '/../Modules/Birth/Routes/breadcrumbs.php';
require __DIR__ . '/../Modules/Divorce/Routes/breadcrumbs.php';
require __DIR__ . '/../Modules/Death/Routes/breadcrumbs.php';
require __DIR__ . '/../Modules/Profile/Routes/breadcrumbs.php';
require __DIR__ . '/../Modules/Forum/Routes/breadcrumbs.php';

Breadcrumbs::for('family.home', function ($trail) {
	$member = auth()->guard('family')->user();
    $page = $member->first_name.' '.$member->last_name;
    if($member->profile){
        $page = $member->profile->family->name;
    }
    $trail->push('Dashboard', route('home',$page));
});

Breadcrumbs::for('family.dashboard', function ($breadcrumbs) {
	$user = auth()->guard('family')->user();
	$page = $user->first_name.' '.$user->last_name;
	if($user->profile){
        $page = $user->profile->family->name;
	}
    $family_page = $user->first_name.' '.$user->last_name;
    if($user->profile){
        $family_page = $user->profile->family->name;
    }
    $breadcrumbs->parent('family.home');
    $breadcrumbs->push($page, route('home',$family_page));
});
// dashboar / family
Breadcrumbs::for('user.family.create', function ($breadcrumbs) {
    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push('Create Family Account', route('home'));
});

