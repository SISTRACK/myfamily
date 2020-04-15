<?php

Breadcrumbs::for('family.birth.create', function ($breadcrumbs, $family) {
    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push('Birth Registration', route('family.birth.create', [$family->name,$family->id]));
});