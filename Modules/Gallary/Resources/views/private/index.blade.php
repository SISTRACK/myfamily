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
    <div class="innerAll spacing-x2">
		@foreach($profile->profileAlbums as $profile_album)
		    <?php 

		    $album = $profile_album->album;
            $path = 'assets/Gallary/'.$profile_album->album->albumContentType->name.'/'.$profile_album->album->name.'/'; 	
		     ?>
		    <div class="row">
		    	<div class="col-sm-12">
		    		<button data-toggle="modal" data-target="#private_{{$profile_album->id}}" class="btn btn-primary btn-block">{{$profile_album->album->getName().' '.$profile_album->album->albumContentType->name.' Album'}}
			        </button>
			        <br>
	                @include('gallary::Modals.private_modal')
		    	</div>
		    </div>
		    @if($profile_album->album->photos != null)
		        <div class="row">
					@foreach($profile_album->album->photos as $photo)
					<div class="col-md-6">
						<div class="widget widget-heading-simple widget-body-white widget-pinterest">
							<div class="widget-body padding-none">
								<a href="{{$path.$photo->photo}}" class="thumb no-ajaxify" data-gallery>
									<img width="400" height="500" class="img img-responsive" src="{{$path.$photo->photo}}" alt="photo" />
								</a>
								<div class="description">
									<h5 class="text-uppercase">{{$photo->title}}</h5>
									<p>{{$photo->description}}</p>
								</div>
							</div>
				        </div>
					</div>
					@endforeach
				</div>
		    @endif
		    @if($profile_album->album->videos != null)
		        @foreach($profile_album->album->videos as $video)
		        <div class="col-md-6">
					<div class="widget widget-heading-simple widget-body-white widget-pinterest">
						<div class="widget-body padding-none">
							<video width="320" height="240" controls>
							    <source src="{{$path.$video->video}}" type="video/mp4">
							</video>
							<div class="description">
								<h5 class="text-uppercase">{{$video->title}}</h5>
								<p>{{$video->description}}</p>
							</div>
						</div>
			        </div>
				</div>
				@endforeach
		    @endif
		    @if($profile_album->album->audios != null)
		        @foreach($profile_album->album->audios as $audio)
                <div class="col-md-6">
					<div class="widget widget-heading-simple widget-body-white widget-pinterest">
						<div class="widget-body padding-none">
							<audio controls>
							    <source src="{{$path.$audio->audio}}" type="audio/mp3">
							</audio>
							<div class="description">
								<h5 class="text-uppercase">{{$audio->title}}</h5>
								<p>{{$audio->description}}</p>
							</div>
						</div>
			        </div>
				</div>
				@endforeach
			@endif
		@endforeach	
    </div>
</div>
		
<div class="clearfix"></div>

@stop

@section('footer')

@stop