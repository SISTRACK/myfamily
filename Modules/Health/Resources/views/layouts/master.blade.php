@extends('layouts.master')

@section('side-bar')
<li>
    <a href="{{route('health.doctor.patient.index')}}"><span class="fa fa-patient"> Patients </span></a>
</li>

<li>
    <a href="{{route('health.doctor.patient.index')}}"><span class="fa fa-patient"> Dis Chardges </span></a>
</li>

@endsection
