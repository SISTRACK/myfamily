@extends('layouts.master')

@section('side-bar')

<li><a href="#" data-toggle="modal" data-target="#create_album">Create Album</a></li>

@if(profile()->profileAlbums)
	<li class="has_sub">
	    <a href="#" class="waves-effect"><i class="mdi mdi-file-image "></i> <span> Private Albums </span> <span class="menu-arrow"></span></a>
	    <ul class="list-unstyled">
	        @foreach(profile()->profileAlbums as $profile_album)
                <li><a href="{{route('album.show',[
                	$profile_album->profile->thisProfileFamily()->name,
                	'private',
                    $profile_album->album->albumContentType->name,
                    $profile_album->album->getName(),
                    $profile_album->album->id,
                	]
                	)}}">{{$profile_album->album->getName().' '.$profile_album->album->albumContentType->name.' Album'}}</a></li>
	        @endforeach
	    </ul>
	</li>
@endif

@if(profile()->thisProfileFamily()->familyAlbums)
	<li class="has_sub">
	    <a href="#" class="waves-effect"><i class="mdi mdi-file-image "></i> <span> Nuclear Family Albums </span> <span class="menu-arrow"></span></a>
	    <ul class="list-unstyled">
	        @foreach(profile()->thisProfileFamily()->familyAlbums as $family_album)
	            @if($family_album->album->albumType->name == 'Nuclear Family')
                    <li><a href="{{route('album.show',[
                	$family_album->family->name,
                	'nuclear-family',
                    $family_album->album->albumContentType->name,
                    $family_album->album->getName(),
                    $family_album->album->id
                	])}}">{{$family_album->album->getName().' '.$family_album->album->albumContentType->name.' Album'}}</a></li>
                @endif
	        @endforeach
	    </ul>
	</li>
@endif
@if(profile()->thisProfileFamily()->root()->familyAlbums)
	<li class="has_sub">
	    <a href="#" class="waves-effect"><i class="mdi mdi-file-image "></i> <span> Extended Family Albums </span> <span class="menu-arrow"></span></a>
	    <ul class="list-unstyled">
	        @foreach(profile()->thisProfileFamily()->root()->familyAlbums as $extended_album)
	            @if($extended_album->album->albumType->name == 'Extended Family')
                    <li><a href="{{route('album.show',[
                	$extended_album->family->name,
                	'extended-family',
                    $extended_album->album->albumContentType->name,
                    $extended_album->album->getName(),
                    $extended_album->album->id
                	])}}">{{$extended_album->album->getName().' '.$extended_album->album->albumContentType->name.' Album'}}</a></li>
                @endif
	        @endforeach
	    </ul>
	</li>
@endif

@endsection