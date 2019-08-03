@extends('admin::layouts.master')

@section('page-content')
	<button class="btn btn-primary"><a href="{{route('admin.health.hospital.create')}}" style="color: white">+</a></button>
	@if(empty($hospitals))
	<div class="alert alert-success h4">No Hospital Record Found</div>
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
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#hospital_'.$hospital->id}}"><i class="fa fa-eye" ></i></button>
	        				<button class="btn btn-warning"><a href="{{route('admin.health.hospital.delete',[$hospital->id])}}">Delete</a></button>
	        			</td>
	        		</tr>
	        		@include('health::Hospital.edit')
            	@endforeach
            </tbody>
        </table>
    @endif
@endsection


