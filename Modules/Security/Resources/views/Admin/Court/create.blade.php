@extends('admin::layouts.master')

@section('page-content')
	<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    	<h2 class="text-primary">New Court</h2>
        <form action="{{route('admin.security.court.register')}}" method="post">
        	@csrf
             <input type="text" name="name" class="form-control" placeholder ="Court Title"><br>
             <select name="court_type_id" class="form-control">
             	<option value="">Court Type</option>
             	@foreach($court_types as $court_type)
                    <option value="{{$court_type->id}}">{{$court_type->name}}</option>
             	@endforeach
             </select><br>
             <select name="court_category_id" class="form-control">
             	<option value="">court Category</option>
             	@foreach($court_categories as $court_category)
                    <option value="{{$court_category->id}}">{{$court_category->name}}</option>
             	@endforeach
             </select><br>
             <select name="town_id" class="form-control">
             	<option value="">Select Town</option>
             	@foreach($districts as $district)
             	    <optgroup label="{{$district->name.' District'}}">
             	    	@foreach($district->towns as $town)
	                        <option value="{{$town->id}}">{{$town->name}}</option>
	         	        @endforeach
             	    </optgroup>
             	@endforeach
             </select><br>
             <textarea name="address" placeholder="Address of the court" class="form-control"></textarea><br>
             <button class="btn btn-primary">Register Court</button>
         </form>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection