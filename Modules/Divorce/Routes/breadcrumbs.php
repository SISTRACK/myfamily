<?php

Breadcrumbs::for('family.wives.available', function ($breadcrumbs, $family) {
    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push('Wives', route('family.divorce.create', $family));
});

Breadcrumbs::for('family.wife.divorce', function ($breadcrumbs, $family) {
    $breadcrumbs->parent('family.wives.available',$family);
    $breadcrumbs->push('Divorce', route('family.wife.divorce', $family));
});

Breadcrumbs::for('family.wife.divorce.return', function ($breadcrumbs, $family) {
    $breadcrumbs->parent('family.wife.divorce',$family);
    $breadcrumbs->push('Return', route('family.wife.divorce.return', $family));
});