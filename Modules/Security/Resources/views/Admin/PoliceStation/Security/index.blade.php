@extends('admin::layouts.master')

@section('page-content')
	<button class="btn btn-primary"><a href="{{route('admin.security.police.station.user.create')}}" style="color: white"><i class="fa fa-plus"></i></a></button>
	@if(empty($stations))
	<div class="alert alert-success h4">No Courts Record Found</div>
    @else
        <table class="table table-default table-responsive">
        	<thead>
        		<tr>
        			<th>S/N</th>
        			<th>Name</th>
        			<th>email</th>
                    <th>phone</th>
                    <th>State Of Origin</th>
        			<th>Report</th>
        			<th>Police Station</th>
        			<th>District</th>
        			<th>Lga</th>
        			<th></th>
        		</tr>
        	</thead>
            <tbody>
            	@foreach($stations as $station)
            	    @if($station->securities->isEmpty())
                        <div class="alert alert-success h4">No User Agent Record Found in {{$station->name}} {{$station->policeStationCategory->name}}</div>
            	    @endif
            	    @foreach($station->securities as $security)
	                    <tr>
		        			<td>{{$loop->index+1}}</td>
		        			<td>{{$security->first_name}} {{$security->last_name}}</td>
		        			<td>{{$security->email}}</td>
                            <td>{{$security->phone}}</td>
                            <td>{{$security->state->name}}</td>
		        			<td>{{count($security->securityReports)}}</td>
		        			<td>{{$security->policeStation->name}}</td>
		        			<td>{{$security->policeStation->policeStationLocation->town->district->name}}</td>
		        			<td>{{$security->policeStation->policeStationLocation->town->lga->name}}</td>
		        			<td>
		        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#security_'.$security->id}}"><i class="fa fa-eye" ></i></button>
		        				<button class="btn btn-warning"><a href="{{route('admin.security.police.station.user.delete',[$security->id])}}">Delete</a></button>
		        			</td>
		        		</tr>
                        @include('security::Admin.PoliceStation.Security.edit')
	        		@endforeach
            	@endforeach
            </tbody>
        </table>
    @endif
@endsection


