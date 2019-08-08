@extends('admin::layouts.master')

@section('page-content')
	<button class="btn btn-primary"><a href="{{route('admin.security.court.create')}}" style="color: white"><i class="fa fa-plus"></i></a></button>
	@if(empty($court))
	<div class="alert alert-success h4">No Court Record Found</div>
    @else
        <table class="table table-default table-responsive">
        	<thead>
        		<tr>
        			<th>S/N</th>
        			<th>Hospital</th>
        			<th>Category</th>
        			<th>Type</th>
        			<th>Type</th>
        			<th>Lga</th>
        			<th>Town</th>
        			<th>Address</th>
        			<th></th>
        		</tr>
        	</thead>
            <tbody>
            	@foreach($hospitals as $hospital)
                    <tr>
	        			<td>{{$loop->index+1}}</td>
	        			<td>{{$hospital->name}}</td>
	        			<td>{{$hospital->hospitalCategory->name}}</td>
	        			<td>{{$hospital->hospitalType->name}}</td>
	        			<td>{{$hospital->hospitalType->name}}</td>
	        			<td>{{$hospital->district->lga->name}}</td>
	        			<td>{{$hospital->hospitalLocation->town->name}}</td>
	        			<td>{{$hospital->hospitalLocation->address}}</td>
	        			<td>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#hospital_'.$hospital->id}}"><i class="fa fa-eye" ></i>
	        				</button>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#doctor_'.$hospital->id}}"><i class="fa fa-user-md" ></i>
	        				</button>
	        				<button class="btn btn-warning"><a href="{{route('admin.health.hospital.delete',[$hospital->id])}}"><i class="fa fa-delete">Delete</i></a></button>
	        			</td>
	        		</tr>
	        		@include('health::Hospital.edit')
	        		@include('health::Hospital.new_doctor')
            	@endforeach
            </tbody>
        </table>
    @endif
@endsection


