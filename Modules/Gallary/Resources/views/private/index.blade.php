@extends('gallary::layouts.master')
@section('page-title')
    {{Breadcrumbs::render('family.gallary.private')}}
@stop
@section('page-content')
<div id="contents">
    <div class="innerAll spacing-x2">
    	<div class="row">
			@foreach(profile()->profileAlbums as $profile_album)
			    <div class="col-sm-4 h4">

		    		<a href="#" data-toggle="modal" data-target="#private_{{$profile_album->id}}"><i class="fa fa-file-pdf-o" style="font-size: 180px;"></i>{{$profile_album->album->getName().' '.$profile_album->album->albumContentType->name.' Album'}}
			        </a>
		        </div>
		        @php $album = $profile_album->album; @endphp
                @include('gallary::Modals.private_modal')
			@endforeach	
		    
		</div>
    </div>
</div>
		
<div class="clearfix"></div>

@stop

@section('footer')

@stop