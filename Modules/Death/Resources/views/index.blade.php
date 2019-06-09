@extends('death::layouts.master')
@section('page-title')
{{'Death registration page'}}
@endsection
@section('side-bar')
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Registration </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('birth.index')}}"><i class="mdi mdi-baby"></i> <span>Birth</span></a></li>
        <li><a href="{{route('marriage.index')}}">Marriage</a></li>
        <li><a href="{{route('divorce.index')}}">Divorce</a></li>
        <li><a href="{{route('death.index')}}">Death</a></li>
    </ul>
</li>
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
