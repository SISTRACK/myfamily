@extends('gallary::layouts.master')
@section('page-name')
    {{'My photo gallary'}}
@stop

@section('page-content')
<!-- <audio controls>
  <source src="horse.ogg" type="audio/ogg">
  <source src="horse.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio> -->
<div id="contents">
	<?php $profile_album = null; ?>
<div class="innerAll bg-white border-bottom">
	@foreach($profile->profileAlbums as $profile_album)
        <?php $album = $profile_album->album; ?>
        <button data-toggle="modal" data-target="#private_{{$profile_album->id}}" class="btn btn-primary">{{$profile_album->album->getName().' '.$profile_album->album->albumContentType->name.' Album'}}
        </button>
        @include('gallary::Modals.private_modal')
	@endforeach
</div>
<br>
<div class="innerAll spacing-x2">
	<div class="row">
		@foreach($profile->profileAlbums as $profile_album)
		    @if($profile_album->album->photos != null)
				@foreach($profile_album->album->photos as $photo)
				<?php $path = 'assets/Gallary/'.$profile_album->album->albumContentType->name.'/'.$profile_album->album->name.'/'.$photo->photo; 
				?>
				<div class="col-md-6">
					<div class="widget widget-heading-simple widget-body-white widget-pinterest">
						<div class="widget-body padding-none">
							<a href="{{$path}}" class="thumb no-ajaxify" data-gallery>
								<img width="400" height="500" class="img img-responsive" src="{{$path}}" alt="photo" />
							</a>
							<div class="description">
								<h5 class="text-uppercase">{{$photo->title}}</h5>
								<p>{{$photo->description}}</p>
							</div>
						</div>
			        </div>
				</div>
				@endforeach
			@endif
		@endforeach
	</div>	
</div>
<!-- // Content END -->
		
<div class="clearfix"></div>

@stop

@section('footer')

@stop