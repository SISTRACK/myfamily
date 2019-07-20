<?php

Breadcrumbs::for('family.gallary.private.album.show', function ($breadcrumbs, $album) {
    $breadcrumbs->parent('family.gallary.private');
    $breadcrumbs->push($album->getName().' '.$album->albumContentType->name, route('album.show', [
    	$album->profileAlbum->profile->thisProfileFamily()->name,
    	'private',
        $album->albumContentType->name,
        $album->getName(),
        $album->id,
    	]
    ));
    $breadcrumbs->push('Album Show', route('album.show', [
    	$album->profileAlbum->profile->thisProfileFamily()->name,
    	'private',
        $album->albumContentType->name,
        $album->getName(),
        $album->id,
    	]
    ));
});

Breadcrumbs::for('family.gallary.nuclear.album.show', function ($breadcrumbs, $album) {
    $breadcrumbs->parent('family.gallary.nuclear');
    $breadcrumbs->push($album->getName().' '.$album->albumContentType->name, route('album.show', [
    	$album->familyAlbum->family->name,
    	'nuclear',
        $album->albumContentType->name,
        $album->getName(),
        $album->id,
    	]
    ));
    $breadcrumbs->push('Album Show', route('album.show', [
    	$album->familyAlbum->family->name,
    	'nuclear',
        $album->albumContentType->name,
        $album->getName(),
        $album->id,
    	]
    ));
});

Breadcrumbs::for('family.gallary.extended.album.show', function ($breadcrumbs, $album) {
    $breadcrumbs->parent('family.gallary.extended');
    $breadcrumbs->push($album->getName().' '.$album->albumContentType->name, route('album.show', [
    	$album->familyAlbum->family->name,
    	'extended',
        $album->albumContentType->name,
        $album->getName(),
        $album->id,
    	]
    ));
    $breadcrumbs->push('Album Show', route('album.show', [
    	$album->familyAlbum->family->name,
    	'extended',
        $album->albumContentType->name,
        $album->getName(),
        $album->id,
    	]
    ));
});

Breadcrumbs::for('family.gallary.private', function ($breadcrumbs) {
    $breadcrumbs->parent('family.gallary.index');
    $breadcrumbs->push('Private', route('family.gallary.private.index',[profile()->thisProfileFamily()->name]));
});

Breadcrumbs::for('family.gallary.nuclear', function ($breadcrumbs) {
    $breadcrumbs->parent('family.gallary.index');
    $breadcrumbs->push('Nuclear', route('family.gallary.nuclear.index',[profile()->thisProfileFamily()->name]));
});
Breadcrumbs::for('family.gallary.extended', function ($breadcrumbs) {
    $breadcrumbs->parent('family.gallary.index');
    $breadcrumbs->push('Extended', route('family.gallary.extended.index',[profile()->thisProfileFamily()->name]));
});
Breadcrumbs::for('family.gallary.index', function ($breadcrumbs) {
    $breadcrumbs->parent('family.dashboard');
    $breadcrumbs->push('Gallery', route('gallary.index',[profile()->thisProfileFamily()->name]));
});