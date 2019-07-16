<?php

Breadcrumbs::for('family.member.profile', function ($breadcrumbs, $profile) {
    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push($profile->user->first_name.' '.$profile->user->last_name."'s profile", route('family.member.profile', [$profile->family->name,$profile->id]));
});

Breadcrumbs::for('family.member.profile.setting', function ($breadcrumbs, $profile) {
    $breadcrumbs->parent('family.member.profile',$profile);
    $breadcrumbs->push('Settings', route('family.member.profile.setting', [$profile->family->name,$profile->id]));
});

