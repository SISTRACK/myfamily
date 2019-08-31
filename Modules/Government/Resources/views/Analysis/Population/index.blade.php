@extends('government::layouts.master')

@section('page-content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	    <form action="{{route('government.analysis.population.search')}}" method="post">
	    	@csrf
	    	<h2 class="text-primary">Search Population Specification</h2>
	    	@if(government()->state)
	    	<label>Local Government</label>
	    	<select name="hospital_type_id" class="form-control">
	    		<option value=""></option>
	    		@foreach(government()->state->lgas as $lga)
                    <option value="{{$lga->id}}">{{$lga->name}}</option>
	    		@endforeach
	    	</select><br>
	    	@endif
	    	@if(government()->state || government()->lga)
	    	<label>District</label>
	    	<select name="hospital_type_id" class="form-control">
	    		<option value=""></option>
	    		@if(government()->lga)
                    @foreach(government()->lga->districts as $district)
	                    <option value="{{$district->id}}">{{$district->name}}</option>
		    		@endforeach
		        @else
		        	@foreach(government()->state->lgas as $lga)
	                    <optgroup label="{{$lga->name}} LGA">
	                    	@foreach($lga->districts as $district)
			                    <option value="{{$district->id}}">{{$district->name}}</option>
				    		@endforeach
	                    </optgroup>
		    		@endforeach	
	    		@endif
	    	</select><br>
	    	@endif
	    	<label>Town</label>
	    	<select name="hospital_category_id" class="form-control">
	    		<option></option>
	    	</select><br>
	    	<label>Year</label>
	    	<select name="town_id" class="form-control">
	    		<option></option>
	    		@foreach($years as $year)
                    <option value="{{$year->id}}">{{$year->year}}</option>
	    		@endforeach
	    	</select><br>
	    	<label>Month</label>
	    	<select name="town_id" class="form-control">
	    		<option></option>
	    		@foreach($months as $month)
                    <option value="{{$month->id}}">{{$month->month}}</option>
	    		@endforeach
	    	</select><br>
	    	<button class="btn btn-info">Search Population</button>
	    </form>
    </div>
</div>
@endsection