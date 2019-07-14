<?php

// require __DIR__ . '/../Modules/Family/Routes/breadcrumbs.php';
// require __DIR__ . '/../Modules/Admin/Routes/breadcrumbs.php';

Breadcrumbs::for('home', function ($trail,$death) {
    $trail->push('Dashboard', route('admin.dashboard'));
    $trail->push($death->profile->family->location->town->district->lga->state->name, route('state.dashboard',[$death->profile->family->location->town->district->lga->state->name,$death->profile->family->location->town->district->lga->state->id]));
    $trail->push($death->profile->family->location->town->district->lga->name, route('lga.dashboard',[$death->profile->family->location->town->district->lga->state->name,$death->profile->family->location->town->district->lga->name]));
    $trail->push($death->profile->family->location->town->district->name, route('district.dashboard',[$death->profile->family->location->town->district->lga->state->name,$death->profile->family->location->town->district->lga->name,$death->profile->family->location->town->district->name]));
    
    
});
