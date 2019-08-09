@extends('admin::layouts.master')

@section('page-content')

	<button class="btn btn-primary"><a href="{{route('admin.security.court.create')}}" style="color: white"><i class="fa fa-plus"></i></a></button>
	@if(empty($courts))
	<div class="alert alert-success h4">No Court Record Found</div>
    @else
    <div class="table-responsive">
        <table class="table table-default">
        	<thead>
        		<tr>
        			<th>S/N</th>
        			<th>Court</th>
        			<th>Category</th>
        			<th>Type</th>
        			<th>Lga</th>
        			<th>District</th>
        			<th>Town</th>
        			<th>Address</th>
        			<th></th>
        		</tr>
        	</thead>
            <tbody>
            	@foreach($courts as $court)
                    <tr>
	        			<td>{{$loop->index+1}}</td>
	        			<td>{{$court->name}}</td>
	        			<td>{{$court->courtCategory->name}}</td>
	        			<td>{{$court->courtType->name}}</td>
	        			<td>{{$court->courtLocation->town->lga->name}}</td>
	        			<td>{{$court->courtLocation->town->district->name}}</td>
	        			<td>{{$court->courtLocation->town->name}}</td>
	        			<td>{{$court->courtLocation->address}}</td>
	        			<td>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#court_'.$court->id}}"><i class="fa fa-eye" ></i>
	        				</button>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#user_'.$court->id}}"><i class="fa fa-user" ></i>
	        				</button>
	        				<button class="btn btn-warning"><a href="{{route('admin.security.court.delete',[$court->id])}}"><i class="fa fa-delete">Delete</i></a></button>
	        			</td>
	        		</tr>
	        		@include('security::Admin.Court.edit')
	        		@include('security::Admin.Court.user')
            	@endforeach
            </tbody>
        </table>
    </div>
    @endif
@stop


