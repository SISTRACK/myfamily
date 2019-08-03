@extends('admin::layouts.master')

@section('page-content')
	<div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
    	<h2 class="text-primary">New Hospital</h2>
        <form action="{{route('admin.health.hospital.register')}}" method="post">
        	@csrf
             <input type="text" name="name" class="form-control" placeholder ="Hospital Title"><br>
             <select name="hospital_type_id" class="form-control">
             	<option value="">Hospital Type</option>
             	@foreach($hospital_types as $hospital_type)
                    <option value="{{$hospital_type->id}}">{{$hospital_type->name}}</option>
             	@endforeach
             </select><br>
             <select name="hospital_category_id" class="form-control">
             	<option value="">Hospital Category</option>
             	@foreach($hospital_categories as $hospital_category)
                    <option value="{{$hospital_category->id}}">{{$hospital_category->name}}</option>
             	@endforeach
             </select><br>
             <select name="town_id" class="form-control">
             	<option value="">Select Town</option>
             	@foreach($towns as $town)
                    <option value="{{$town->id}}">{{$town->name}}</option>
             	@endforeach
             </select><br>
             <textarea name="address" placeholder="Address of the hospital" class="form-control"></textarea><br>
             <button class="btn btn-primary">Register Hospital</button>
         </form>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection