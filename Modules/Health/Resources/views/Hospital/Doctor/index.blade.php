@extends('health::layouts.master')

@section('page-content')
	<button class="btn btn-info"><a href="#" data-toggle="modal" data-target="#new_doctor" style="color: white"><i class="fa fa-plus"></i></a></button>
	@include('health::Hospital.Doctor.create')
	@if(count(doctor()->hospital->doctors) <= 1)
	<div class="alert alert-success h4">No Doctors Record Found</div>
    @else
        <table class="table table-default table-responsive">
        	<thead>
        		<tr>
        			<th>S/N</th>
        			<th>Name</th>
        			<th>email</th>
                    <th>phone</th>
                    <th>State Of Origin</th>
        			<th>Admissions</th>
        			<th>Discharges</th>
        			<th>Department</th>
        			<th>Discpline</th>
        			<th></th>
        		</tr>
        	</thead>
            <tbody>
            @foreach(doctor()->hospital->doctors as $doctor)
	            @if($doctor->role_id != 1)
		        <tr>
					<td>{{$loop->index}}</td>
					<td>{{$doctor->first_name}} {{$doctor->last_name}}</td>
					<td>{{$doctor->email}}</td>
		            <td>{{$doctor->phone}}</td>
		            <td>{{$doctor->state->name}}</td>
					<td>{{count($doctor->hospitalAdmissions)}}</td>
					<td>
						{{count($doctor->discharges())}}
					</td>
					<td>{{$doctor->hospitalDepartment->name}}</td>
					<td>{{$doctor->discpline->name}}</td>
					<td>
						<button class="btn btn-info" data-toggle="modal" data-target="{{'#doctor_'.$doctor->id}}"><i class="fa fa-eye" ></i></button>
						<button class="btn btn-warning"><a href="{{route('health.hospital.doctor.delete',[$doctor->id])}}">Delete</a></button>
					</td>
				</tr>
	            @include('health::Hospital.Doctor.update')
                @endif
	        @endforeach
            </tbody>
        </table>
    @endif
@endsection


