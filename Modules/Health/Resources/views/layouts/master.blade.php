@extends('layouts.master')

@section('side-bar')
@if(doctor()->role_id == 1)
    <li>
	    <a href="{{route('health.hospital.doctor.index')}}"><i class="fa fa-user-md" ></i><span> Doctors </span></a>
	</li>
	<li class="has_sub">
	    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Reports </span> <span class="menu-arrow"></span></a>
	    <ul class="list-unstyled">
	        <li><a href="{{route('health.hospital.report.admission')}}"><span> Admissions </span></a></li>
	        <li><a href="{{route('health.hospital.report.discharge')}}"><span> Discharges </span></a></li>
	    </ul>
	</li>
@else
	<li>
	    <a href="{{route('health.hospital.doctor.patient.create')}}"><span class="fa fa-patient"> Admission </span></a>
	</li>

    <li>
	    <a href="{{route('health.hospital.doctor.patient.index')}}"><span class="fa fa-patient"> Patients </span></a>
	</li>

	<li>
	    <a href="{{route('health.hospital.doctor.patient.index')}}"><span class="fa fa-patient"> Dis Chardges </span></a>
	</li>
@endif
@endsection
