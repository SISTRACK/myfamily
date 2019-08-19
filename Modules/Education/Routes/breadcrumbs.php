<?php

Breadcrumbs::for('education.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('education.dashboard'));
});

Breadcrumbs::for('education.school.admission.index', function ($breadcrumbs) {
    $breadcrumbs->parent('education.dashboard');
    $breadcrumbs->push(request()->route('year').' Admissions', route('education.school.admission.index', [request()->route('year')]));
});

Breadcrumbs::for('education.school.graduation.index', function ($breadcrumbs) {
    $breadcrumbs->parent('education.dashboard');
    $breadcrumbs->push(request()->route('year').' Graduations', route('education.school.admission.index', [request()->route('year')]));
});

Breadcrumbs::for('education.school.report.index', function ($breadcrumbs) {
    $breadcrumbs->parent('education.dashboard');
    $breadcrumbs->push(request()->route('year').' Reports', route('education.school.admission.index', [request()->route('year')]));
});

Breadcrumbs::for('education.school.admission.verification.create', function ($breadcrumbs) {
    $breadcrumbs->parent('education.dashboard');
    $breadcrumbs->push(request()->route('year').' Admission Verification', route('education.school.admission.verification.create', [request()->route('year')]));
});

Breadcrumbs::for('education.school.admission.verification.profile', function ($breadcrumbs,$user) {
    $breadcrumbs->parent('education.school.admission.verification.create');
    $breadcrumbs->push('Profile', route('education.school.admission.verification.profile', [request()->route('year'),request()->route('profile_id')]));
});    