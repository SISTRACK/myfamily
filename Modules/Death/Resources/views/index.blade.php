@extends('death::layouts.master')
@section('page-title')
{{ Breadcrumbs::render('family.death.create',$family) }}
@endsection

@section('page-content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box">
			    @include('death::Forms.register_death')
	        </div>
	    </div>
	</div>
@stop
