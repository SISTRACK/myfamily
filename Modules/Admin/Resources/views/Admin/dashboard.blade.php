@extends('admin::layouts.master')

@section('side-bar')
	@include('Include.Menu.admin-side-bar')
@endsection
@section('page-title')
    {{'General System Dashboard'}}
@endsection
@section('page-content')
	@if(isset($states))
	    @foreach($states as $state)
			<div class="col-lg-4 col-md-6 col-sm-8">
			    <div class="card-box widget-box-one">
			    	<a href="{{route('state.dashboard',[strtolower(str_replace(' ','-',$state->name)),$state->id])}}">
				        <div class="wigdet-one-content center">
				            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="{{'Click here to see more of ' .strtoupper($state->name). ' State'}}">{{strtoupper($state->name). ' State'}}</p>
				            <h4 class="btn btn-success">{{count($state->lgas)}} {{' LGA'}}</h4>
				        </div>
			        </a>
			    </div>
			</div>
	    @endforeach 
	@endif  
@endsection


