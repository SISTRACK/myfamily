@extends('gallary::layouts.master')
@section('page-name')
    {{'Nuclear family vedio gallary'}}
@stop

@section('page-content')
<div id="contents">
	<div class="innerAll bg-white border-bottom">
		<ul class="menubar">
		<li class="active"><a href="#">Nuclear Family Photo Gallery</a></li>
		<li><a href="#">Nuclear Family Video Gallery</a></li>
		</ul>
	</div>
	<div class="innerAll spacing-x2">
		<div data-toggle="gridalicious" data-gridalicious-width="380" data-gridalicious-gutter="0" class="hide2">
		<div class="widget widget-heading-simple widget-body-white widget-pinterest active">
			<div class="widget-body padding-none">
				<a href="http://vimeo.com/59015141" data-toggle="prettyPhoto" class="thumb">
					<img src="http://demo.mosaicpro.biz/assets/media/video/1.jpg" alt="photo" />
				</a>
				<div class="description">
					<h5 class="text-uppercase">Publix Sprinkler</h5>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				</div>
			</div>
		</div>
	</div>
</div>		
<!-- // Content END -->
		
@stop
@section('footer')

@stop