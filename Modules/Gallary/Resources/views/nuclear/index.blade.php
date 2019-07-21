@extends('gallary::layouts.master')
@section('page-title')
    {{Breadcrumbs::render('family.gallary.nuclear')}}
@stop

@section('page-content')
    @foreach(profile()->thisProfileFamily()->familyAlbums as $family_album)
        @if($family_album->album->albumType->name == 'Nuclear Family')
		    <div class="col-sm-4 h4">
				<a href="#" data-toggle="modal" data-target="#private_{{$family_album->id}}"><i class="fa fa-folder-open" style="font-size: 180px;"></i>{{$family_album->album->getName().' '.$family_album->album->albumContentType->name.' Album'}}
		        </a>
		    </div>
        @endif
        @php $profile_album = $family_album; @endphp
        @include('gallary::Modals.private_modal')
	@endforeach
@stop

@section('footer')

@stop