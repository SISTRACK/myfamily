@extends('gallary::layouts.master')
@section('page-title')
    @switch($album->albumType->name)
		@case('Private')
				{{Breadcrumbs::render('family.gallary.private.album.show',$album)}}
			@break
		@case('Nuclear Family')
				{{Breadcrumbs::render('family.gallary.nuclear.album.show',$album)}}
			@break
		@default
				{{Breadcrumbs::render('family.gallary.extended.album.show',$album)}}
    @endswitch
@stop
@section('page-content')

<div id="contents">
    <div class="innerAll spacing-x2">
		    <?php 
		    
            $path = 'Nfamily/Gallary/'.$album->albumContentType->name.'/'.$album->name.'/'; 	
		    ?>
		    @if($album->photos)
		        <div class="row">
					@foreach($album->photos as $photo)
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
		    @if($album->videos != null)
		        @foreach($album->videos as $video)
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
		    @if($album->audios != null)
		        @foreach($album->audios as $audio)
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
			
    </div>
</div>
		
<div class="clearfix"></div>

@stop

@section('footer')

@stop