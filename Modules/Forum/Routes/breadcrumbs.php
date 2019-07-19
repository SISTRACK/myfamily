<?php

Breadcrumbs::for('family.member.nuclear.forum', function ($breadcrumbs, $family) {
    $breadcrumbs->parent('family.forum.index', $family);
    $breadcrumbs->push('Nuclear', route('nuclear.forum.index', [$family[0]->name,'nuclear-forum']));
});
Breadcrumbs::for('family.member.extended.forum', function ($breadcrumbs, $family) {
    $breadcrumbs->parent('family.forum.index', $family);
    $breadcrumbs->push('Extended', route('extended.forum.index', [$family[0]->name,'extended-forum']));
});

Breadcrumbs::for('family.forum.index', function ($breadcrumbs, $family) {
    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push('Forum', route('family.forum.index', $family[0]->name));
});
