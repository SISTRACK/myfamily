<?php

Breadcrumbs::for('family.death.create', function ($breadcrumbs, $family) {
    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push('Death Registration', route('family.death.create', [$family->name, $family->id, request()->route('status')]));
});