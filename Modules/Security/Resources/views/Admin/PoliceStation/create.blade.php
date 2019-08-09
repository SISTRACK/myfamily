@extends('admin::layouts.master')

@section('page-content')
	<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    	<h2 class="text-primary">New Police Station</h2>
        <form action="{{route('admin.security.police.station.register')}}" method="post">
        	@csrf
            <input type="text" name="name" class="form-control" placeholder ="Police Station Title"><br>
             <select name="police_station_type_id" class="form-control">
             	<option value="">Police Station Type</option>
             	@foreach($station_types as $station_type)
                    <option value="{{$station_type->id}}">{{$station_type->name}}</option>
             	@endforeach
             </select><br>
             <select name="police_station_category_id" class="form-control">
             	<option value="">Police Station Category</option>
             	@foreach($station_categories as $station_category)
                    <option value="{{$station_category->id}}">{{$station_category->name}}</option>
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
             <button class="btn btn-primary">Register Police Station</button>
         </form>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection