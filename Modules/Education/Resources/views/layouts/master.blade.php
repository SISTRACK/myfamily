@extends('layouts.master')
@section('page-title')
    {{Breadcrumbs::render()}}
@endsection
@section('side-bar')

<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-pencil"></i> <span> Admission </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="{{route('education.school.admission.verification.create')}}"><span class="fa fa-pencil"> Admission </span></a>
        </li>
        <li>
            <a href="{{route('education.school.admission.list')}}"><span class="fa fa-pencil">Admitted Students</span></a>
        </li>
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-graduation-cap"></i> <span> Graduation </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="{{route('education.school.graduation.index',[date('Y')])}}"><span class="fa fa-graduation-cap"> {{date('Y')}} Graduation</span></a>
        </li>
        @foreach(schoolAdmin()->school->yearsOfAdmission() as $year)
            @if($year != date('Y'))
                <li>
                    <a href="{{route('education.school.graduation.index',[$year])}}"><span class="fa fa-graduation-cap"> {{$year}} Graduation</span></a>
                </li>
            @endif
        @endforeach
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-book"></i> <span> Student Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="{{route('education.school.report.index',[date('Y')])}}"><span class="fa fa-book"> {{date('Y')}} Reports</span></a>
        </li>
        @foreach(schoolAdmin()->school->yearsOfAdmission() as $year)
            @if($year != date('Y'))
                <li>
                    <a href="{{route('education.school.report.index',[$year])}}"><span class="fa fa-book"> {{$year}} Reports</span></a>
                </li>
            @endif
        @endforeach
    </ul>
</li>


<li class="has_sub">
    <a href="#" class="waves-effect"><i class="fa fa-chart"></i> <span>Statistics Chart </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li>
        	<a href="{{route('education.school.chart.admission',[date('Y')])}}">Admission</a>
        </li>
        <li>
        	<a href="{{route('education.school.chart.graduation',[date('Y')])}}">Graduation</a>
        </li>
        <li>
        	<a href="{{route('education.school.chart.report',[date('Y')])}}">Student Report</a>
        </li>
    </ul>
</li>

@endsection
