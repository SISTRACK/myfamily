@extends('layouts.master')
@section('side-bar')

<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-chart"></i> <span> School </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li>
        	<a href="{{route('education.school.admission.index',[date('Y')])}}">Admission</a>
        </li>
        <li>
        	<a href="{{route('education.school.graduation')}}">Graduation</a>
        </li>
        <li>
        	<a href="{{route('education.school.report')}}">Report</a>
        </li>
    </ul>
</li>

<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-chart"></i> <span> Charts </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li>
        	<a href="{{route('education.school.chart.admission')}}">Admission</a>
        </li>
        <li>
        	<a href="{{route('education.school.chart.graduation')}}">Graduation</a>
        </li>
        <li>
        	<a href="{{route('education.school.chart.report')}}">Student Report</a>
        </li>
    </ul>
</li>

@endsection
