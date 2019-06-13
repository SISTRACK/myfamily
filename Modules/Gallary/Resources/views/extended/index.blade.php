@extends('gallary::layouts.master')
@section('page-title')
    {{'My Extended Family Gallary'}}
@stop

@section('page-content')

<div id="contents">
	<?php $family_album = null; ?>
    <div class="innerAll spacing-x2">
		@foreach($profile->family->root()->familyAlbums as $family_album)
		    @if($family_album->album->albumType->name == 'Extended Family')
			    <?php 
			    $album = $family_album->album;
	            $path = 'assets/Gallary/'.$family_album->album->albumContentType->name.'/'.$family_album->album->name.'/';
	            $profile_album = $family_album; 	
			     ?>
			    <div class="row">
			    	<div class="col-sm-12">
			    		<button data-toggle="modal" data-target="#private_{{$family_album->id}}" class="btn btn-primary btn-block">{{$family_album->album->getName().' '.$family_album->album->albumContentType->name.' Album'}}
				        </button>
				        <br>
		                @include('gallary::Modals.private_modal')
			    	</div>
			    </div>
			    @if($family_album->album->photos != null)
			        <div class="row">
						@foreach($family_album->album->photos as $photo)
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
			    @if($family_album->album->videos != null)
			        @foreach($family_album->album->videos as $video)
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
			    @if($family_album->album->audios != null)
			        @foreach($family_album->album->audios as $audio)
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
			@endif
		@endforeach	
    </div>
</div>
		
<div class="clearfix"></div>

@stop

@section('footer')

@stop