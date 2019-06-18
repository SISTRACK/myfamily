@extends('gallary::layouts.master')
@section('page-title')
    {{'My photo gallary'}}
@stop
@section('page-content')

<div id="contents">
	<?php $profile_album = null;
	 ?>
    <div class="innerAll spacing-x2">
		@foreach($profile->profileAlbums as $profile_album)
		    <?php 

		    $album = $profile_album->album;
            $path = 'Nfamily/Gallary/'.$profile_album->album->albumContentType->name.'/'.$profile_album->album->name.'/'; 	
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
					<?php
	                $data = ['type'=>'Photo','object'=>$photo];
			        ?>
					<div class="col-md-6">
						<div class="widget widget-heading-simple widget-body-white widget-pinterest">
							<div class="widget-body padding-none">
								<a href="{{storage_url($path.$photo->photo)}}" class="thumb no-ajaxify" data-gallery>
									<img width="400" height="500" class="img img-responsive" src="{{storage_url($path.$photo->photo)}}" alt="photo" />
								</a>
								
								<div class="description">
									<a href="#" data-toggle="modal" data-target="#update_{{strtolower($data['type']).'_'.$photo->id}}">
									<h5 class="text-uppercase">{{$photo->title}}</h5>
									<p>{{$photo->description}}</p>
									<p>{{$photo->published == 'on' ? 'Published' : 'Not Published'}}</p>
									</a>
								</div>
							    @include('gallary::Modals.update')
							</div>
				        </div>
					</div>
					@endforeach
				</div>
		    @endif
		    @if($profile_album->album->videos != null)
		        @foreach($profile_album->album->videos as $video)
		        <?php
                $data = ['type'=>'Video','object'=>$video];
		        ?>
		        <div class="col-md-6">
					<div class="widget widget-heading-simple widget-body-white widget-pinterest">
						<div class="widget-body padding-none">
							<video width="320" height="240" controls>
							    <source src="{{storage_url($path.$video->video)}}" type="video/mp4">
							</video>
							<a href="#" data-toggle="modal" data-target="#update_{{strtolower($data['type']).'_'.$video->id}}">
							<div class="description">
								<h5 class="text-uppercase">{{$video->title}}</h5>
								<p>{{$video->description}}</p>
								<p>{{$video->published == 'on' ? 'Published' : 'Not Published'}}
							</div>
						    </a>
						    @include('gallary::Modals.update')
						</div>
			        </div>
				</div>
				@endforeach
		    @endif
		    @if($profile_album->album->audios != null)
		        @foreach($profile_album->album->audios as $audio)
		        <?php
                $data = ['type'=>'Audio','object'=>$audio];
		        ?>
                <div class="col-md-6">
					<div class="widget widget-heading-simple widget-body-white widget-pinterest">
						<div class="widget-body padding-none">
							<audio controls>
							    <source src="{{storage_url($path.$audio->audio)}}" type="audio/mp3">
							</audio>
							<a href="#" data-toggle="modal" data-target="#update_{{strtolower($data['type']).'_'.$audio->id}}">
							<div class="description">
								<h5 class="text-uppercase">{{$audio->title}}</h5>
								<p>{{$audio->description}}</p>
								<p>{{$audio->published == 'on' ? 'Published' : 'Not Published'}}
							</div>
							</a>
							@include('gallary::Modals.update')
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