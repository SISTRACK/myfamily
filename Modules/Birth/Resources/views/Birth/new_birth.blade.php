@extends('birth::layouts.master')

@section('page-title')
    {{ Breadcrumbs::render('family.birth.create',$family) }}
@endsection

@section('page-content')
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
            @include('birth::Birth.Forms.registration_form')
		</div>
	</div>
</div><!-- End row -->
@endsection

@section('footer')

@endsection