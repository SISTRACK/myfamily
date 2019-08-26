@extends('layouts.master')

@section('side-bar')
@if(doctor()->role_id == 1)
    <li>
	    <a href="{{route('health.hospital.doctor.index')}}"><span class="fa fa-patient"> Doctors </span></a>
	</li>
@else
	<li>
	    <a href="{{route('health.hospital.doctor.patient.index')}}"><span class="fa fa-patient"> Patients </span></a>
	</li>

	<li>
	    <a href="{{route('health.hospital.doctor.patient.index')}}"><span class="fa fa-patient"> Dis Chardges </span></a>
	</li>
@endif
@endsection
