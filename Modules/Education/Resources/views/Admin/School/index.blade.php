@extends('admin::layouts.master')

@section('page-content')
	<button class="btn btn-primary"><a href="{{route('admin.education.school.create')}}" style="color: white"><i class="fa fa-plus"></i></a></button>
	@if(empty($schools))
	<div class="alert alert-success h4">No School Record Found</div>
    @else
        <table class="table table-default table-responsive">
        	<thead>
        		<tr>
        			<th>S/N</th>
        			<th>School</th>
        			<th>Category</th>
        			<th>Type</th>
        			<th>Lga</th>
        			<th>Town</th>
        			<th>Address</th>
        			<th></th>
        		</tr>
        	</thead>
            <tbody>
            	@foreach($schools as $school)
                    <tr>
	        			<td>{{$loop->index+1}}</td>
	        			<td>{{$school->name}}</td>
	        			<td>{{$school->schoolCategory->name}}</td>
	        			<td>{{$school->schoolType->name}}</td>
	        			<td>{{$school->schoolLocation->town->lga->name}}</td>
	        			<td>{{$school->schoolLocation->town->name}}</td>
	        			<td>{{$school->schoolLocation->address}}</td>
	        			<td>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#school_'.$school->id}}"><i class="fa fa-eye" ></i>
	        				</button>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#teacher_'.$school->id}}"><i class="fa fa-user-md" ></i>
	        				</button>
	        				<button class="btn btn-warning"><a href="{{route('admin.education.school.delete',[$school->id])}}"><i class="fa fa-delete">Delete</i></a></button>
	        			</td>
	        		</tr>
	        		@include('education::Admin.School.edit')
	        		@include('education::Admin.School.new_teacher')
            	@endforeach
            </tbody>
        </table>
    @endif
@endsection


