@extends('death::layouts.master')
@section('page-title')
{{ Breadcrumbs::render('family.death.create',[profile()->family->name]) }}
@endsection

@section('page-content')
	<div class="row">
		<div class="col-sm-12">
			<div class="card-box">
			    @if(session('death'))
			        @include('death::Forms.register_death')
			    @else
			        @include('death::Forms.verify_family')
			    @endif
	        </div>
	    </div>
	</div>
@stop
