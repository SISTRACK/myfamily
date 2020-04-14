<?php

Breadcrumbs::for('family.marriage.create', function ($breadcrumbs, $family) {

    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push('New Marriage', route('family.marriage.create', $family, $family->id));
});