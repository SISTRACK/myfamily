@extends('admin::layouts.master')
@section('page-title')
    {{ Breadcrumbs::render('admin.lga.dashboard',$lga) }}
@endsection
@section('page-content')
    <div class="col-lg-4 col-md-6 col-sm-8">
    	<a href="#" data-toggle="modal" data-target="#new_district" class="btn btn-info">
		    <div class="card-box widget-box-one">
		        <div class="wigdet-one-content">
		            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="click me to register new district in this lga"></p>
		            <h2 >NEW DISTRICT</h2>
		        </div>
		    </div>
	    </a>
	    @include('admin::Admin.Modals.new_district')
	</div>
    @foreach($lga->districts as $district)
		<div class="col-lg-4 col-md-6 col-sm-8">
		    <div class="card-box widget-box-one">
		    	<a href="{{route('district.dashboard',[
		    	strtolower(str_replace(' ','-',$district->lga->state->name)),
		    	strtolower(str_replace(' ','-',$district->lga->name)),
		    	strtolower(str_replace(' ','-',$district->name)),
		    	$district->id
		    	])}}">
		        <div class="wigdet-one-content center">
		            <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="{{'Click here to see more of ' .strtoupper($district->name). ' DISTRICTS'}}">{{strtoupper($district->name). ' DISTRICTS'}}</p>
		            <h4 class="btn btn-success">{{count($district->towns)}} {{' Towns'}}</h4>
		        </div>
		        </a>
		    </div>
		</div>
    @endforeach
@endsection