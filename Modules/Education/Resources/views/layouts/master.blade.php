@extends('layouts.master')
@section('side-bar')
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-pencil"></i> <span> Admission </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        @foreach(schoolAdmin()->school->yearsOfAdmission() as $year)
        <li>
            <a href="{{route('education.school.admission.index',[$year])}}">{{$year}} Admission</a>
        </li>
        @endforeach
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-graduation-cap"></i> <span> Graduation </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        @foreach(schoolAdmin()->school->yearsOfAdmission() as $year)
        <li>
            <a href="{{route('education.school.graduation.index',[$year])}}">{{$year}} Admission</a>
        </li>
        @endforeach
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-book"></i> <span> Student Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        @foreach(schoolAdmin()->school->yearsOfAdmission() as $year)
        <li>
            <a href="{{route('education.school.report',[$year])}}">{{$year}} Admission</a>
        </li>
        @endforeach
    </ul>
</li>


<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-chart"></i> <span>Statistics Chart </span> <span class="menu-arrow"></span></a>
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
