@extends('admin::layouts.master')

@section('page-content')
	<button class="btn btn-primary"><a href="{{route('admin.health.doctor.create')}}" style="color: white">+</a></button>
	@if(empty($hospitals))
	<div class="alert alert-success h4">No Hospitals Record Found</div>
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
        			<th>Hospital</th>
        			<th>Discpline</th>
        			<th>District</th>
        			<th>Lga</th>
        			<th></th>
        		</tr>
        	</thead>
            <tbody>
            	@foreach($hospitals as $hospital)
            	    @if($hospital->doctors->isEmpty())
                        <div class="alert alert-success h4">No Doctors Record Found in {{$hospital->name}} {{$hospital->hospitalCategory->name}}</div>
            	    @endif
            	    @foreach($hospital->doctors as $doctor)
	                    <tr>
		        			<td>{{$loop->index+1}}</td>
		        			<td>{{$doctor->first_name}} {{$doctor->last_name}}</td>
		        			<td>{{$doctor->email}}</td>
                            <td>{{$doctor->phone}}</td>
                            <td>{{$doctor->state->name}}</td>
		        			<td>{{count($doctor->medicalReport)}}</td>
		        			<td>{{$doctor->hospital->name}}</td>
		        			<td>{{$doctor->discpline->name}}</td>
		        			<td>{{$doctor->hospital->district->name}}</td>
		        			<td>{{$doctor->hospital->hospitalLocation->town->lga->name}}</td>
		        			<td>
		        				<button class="btn btn-info" data-toggle="modal" data-target="{{'#doctor_'.$doctor->id}}"><i class="fa fa-eye" ></i></button>
		        				<button class="btn btn-warning"><a href="{{route('admin.health.doctor.delete',[$doctor->id])}}">Delete</a></button>
		        			</td>
		        		</tr>
                        @include('health::Doctor.edit')
	        		@endforeach
            	@endforeach
            </tbody>
        </table>
    @endif
@endsection


