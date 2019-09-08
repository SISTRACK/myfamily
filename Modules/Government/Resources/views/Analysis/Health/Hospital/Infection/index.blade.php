@extends('government::layouts.master')

@section('page-content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	    <form action="{{route('government.analysis.health.hospital.infection.search')}}" method="post">
	    	@csrf
	    	<h2 class="text-primary">Search Health Report Specification</h2>
	    	<label>Infection</label>
	    	<select class="form-control" name="infection">
	    		<option value=""></option>
	    		@foreach(government()->infections() as $infection)
	    		<option value="{{$infection->id}}">{{$infection->name}}</option>
	    		@endforeach
	    	</select>
	    	@include('government::Analysis.include')
	    	<button class="btn btn-info">Search Infection Report</button>
	    </form>
    </div>
</div>
@endsection

@section('footer')
    
@endsection