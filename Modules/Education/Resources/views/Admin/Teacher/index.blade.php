@extends('admin::layouts.master')

@section('page-content')
	<button class="btn btn-primary"><a href="{{route('admin.education.school.teacher.create')}}" style="color: white"><i class="fa fa-plus"></i></a></button>
	@if(empty($schools))
	<div class="alert alert-success h4">No Teacher Record Found</div>
    @else
        <table class="table table-default table-responsive">
        	<thead>
        		<tr>
        			<th>S/N</th>
        			<th>Name</th>
        			<th>email</th>
                    <th>phone</th>
                    <th>State Of Origin</th>
        			<th>School</th>
        			<th>District</th>
        			<th>Lga</th>
        			<th></th>
        		</tr>
        	</thead>
            <tbody>
            	@foreach($schools as $school)
            	    @if($school->teachers->isEmpty())
                        <div class="alert alert-success h4">No User Agent Record Found in {{$school->name}} {{$school->schoolCategory->name}}</div>
            	    @endif
            	    @foreach($school->teachers as $teacher)
	                    <tr>
		        			<td>{{$loop->index+1}}</td>
		        			<td>{{$teacher->first_name}} {{$teacher->last_name}}</td>
		        			<td>{{$teacher->email}}</td>
                            <td>{{$teacher->phone}}</td>
                            <td>{{$teacher->state->name}}</td>
		        			<td>{{$teacher->school->name}}</td>
		        			<td>{{$teacher->school->schoolLocation->town->district->name}}</td>
		        			<td>{{$teacher->school->schoolLocation->town->lga->name}}</td>
		        			<td>
		        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#teacher_'.$teacher->id}}"><i class="fa fa-eye" ></i></button>
		        				<button class="btn btn-warning"><a href="{{route('admin.education.school.teacher.delete',[$teacher->id])}}">Delete</a></button>
		        			</td>
		        		</tr>
                        @include('education::Admin.Teacher.edit')
	        		@endforeach
            	@endforeach
            </tbody>
        </table>
    @endif
@endsection


