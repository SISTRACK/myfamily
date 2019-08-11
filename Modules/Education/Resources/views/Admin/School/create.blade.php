@extends('admin::layouts.master')

@section('page-content')
	<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    	<h2 class="text-primary">New School</h2>
        <form action="{{route('admin.education.school.register')}}" method="post">
        	@csrf
             <input type="text" name="name" class="form-control" placeholder ="school Title"><br>
             <select name="school_type_id" class="form-control">
             	<option value="">School Type</option>
             	@foreach($school_types as $school_type)
                    <option value="{{$school_type->id}}">{{$school_type->name}}</option>
             	@endforeach
             </select><br>
             <select name="school_category_id" class="form-control">
             	<option value="">school Category</option>
             	@foreach($school_categories as $school_category)
                    <option value="{{$school_category->id}}">{{$school_category->name}}</option>
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
             <textarea name="address" placeholder="Address of the school" class="form-control"></textarea><br>
             <button class="btn btn-primary">Register school</button>
         </form>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection