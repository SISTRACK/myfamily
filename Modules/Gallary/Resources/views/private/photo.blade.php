@extends('gallary::layouts.master')
@section('page-name')
    {{'My photo gallary'}}
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
	<div class="row">
		<div class="col-md-6">
			<div class="widget widget-heading-simple widget-body-white widget-pinterest">
				<div class="widget-body padding-none">
					<a href="assets/images/gallery/1.jpg" class="thumb no-ajaxify" data-gallery>
						<img class="img img-responsive" src="assets/images/gallery/1.jpg" alt="photo" />
					</a>
					<div class="description">
						<h5 class="text-uppercase">Photo title</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry here.</p>
					</div>
				</div>
	        </div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="widget widget-heading-simple widget-body-white widget-pinterest">
				<div class="widget-body padding-none">
					<a href="assets/images/gallery/1.jpg" class="thumb no-ajaxify" data-gallery>
						<img class="img img-responsive" src="assets/images/gallery/2.jpg" alt="photo" />
					</a>
					<div class="description">
						<h5 class="text-uppercase">Photo title</h5>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry here.</p>
					</div>
				</div>
	        </div>
		</div>
	</div>	
</div>
<!-- // Content END -->
		
<div class="clearfix"></div>
		
@stop

@section('footer')

@stop