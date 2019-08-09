@extends('admin::layouts.master')

@section('page-content')

	<button class="btn btn-primary"><a href="{{route('admin.security.police.station.create')}}" style="color: white"><i class="fa fa-plus"></i></a></button>
	@if(empty($stations))
	<div class="alert alert-success h4">No Police Station Record Found</div>
    @else
    <div class="table-responsive">
        <table class="table table-default">
        	<thead>
        		<tr>
        			<th>S/N</th>
        			<th>Station</th>
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
            	@foreach($stations as $station)
                    <tr>
	        			<td>{{$loop->index+1}}</td>
	        			<td>{{$station->name}}</td>
	        			<td>{{$station->policeStationCategory->name}}</td>
	        			<td>{{$station->policeStationType->name}}</td>
	        			<td>{{$station->policeStationLocation->town->lga->name}}</td>
	        			<td>{{$station->policeStationLocation->town->district->name}}</td>
	        			<td>{{$station->policeStationLocation->town->name}}</td>
	        			<td>{{$station->policeStationLocation->address}}</td>
	        			<td>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#station_'.$station->id}}"><i class="fa fa-eye" ></i>
	        				</button>
	        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#user_'.$station->id}}"><i class="fa fa-user" ></i>
	        				</button>
	        				<button class="btn btn-warning"><a href="{{route('admin.security.police.station.delete',[$station->id])}}"><i class="fa fa-delete">Delete</i></a></button>
	        			</td>
	        		</tr>
	        		@include('security::Admin.PoliceStation.edit')
            	@endforeach
            </tbody>
        </table>
    </div>
    @endif
@stop


