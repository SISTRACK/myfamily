@extends('admin::layouts.master')

@section('page-content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	    <form action="{{route('admin.health.hospital.register')}}" method="post">
	    	@csrf
	    	<h2 class="text-primary">New Hospital</h2>
	    	<label>Hospital Name</label>
	    	<input type="text" name="name" class="form-control"><br>
	    	<label>Hospital Type</label>
	    	<select name="hospital_type_id" class="form-control">
	    		<option value=""></option>
	    		@foreach($hospital_types as $type)
	                <option value="{{$type->id}}">{{$type->name}}</option>
	    		@endforeach
	    	</select><br>
	    	<label>Hospital Category</label>
	    	<select name="hospital_category_id" class="form-control">
	    		<option></option>
	    		@foreach($hospital_categories as $hosptal_category)
	                <option value="{{$hosptal_category->id}}">{{$hosptal_category->name}}</option>
	    		@endforeach
	    	</select><br>
	    	<label>Hospital Town</label>
	    	<select name="town_id" class="form-control">
	    		<option></option>
	    		@foreach($districts as $district)
		    		<optgroup label="{{$district->name}} District">
		    			@foreach($district->towns as $town)
		                    <option value="{{$town->id}}">{{$town->name}}</option>
		    			@endforeach
		    		</optgroup>   
	    		@endforeach
	    	</select><br>
	    	<label>Hospital Address</label>
	    	<textarea class="form-control" name="address"></textarea><br>
	    	<button class="btn btn-info">Register</button>
	    </form>
    </div>
</div>
@endsection