@extends('layouts.master')

@section('side-bar')
<?php 
$user = auth()->guard('government')->user();
if($user->lga){
    $status = $user->lga->name.'-local-government';
}elseif ($user->state) {
    $status = $user->state->name.'-state';
}elseif ($user->district) {
    $status = $user->district->name.'-district';
}
?>
<li><a href="{{route('government.analysis.population.index')}}">Population</a></li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Social Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('government.analysis.birth.index')}}"><span> Births </span></a></li>
        <li><a href="{{route('government.report.death')}}"><span> Deaths </span></a></li>
        <li><a href="{{route('government.analysis.marriage.index')}}"><span> Marriages </span></a></li>
        <li><a href="{{route('government.report.divorce')}}"><span> Divorces </span></a></li>
        <li><a href="{{route('government.report.accident')}}"><span> Accidents </span></a></li>
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Health Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('government.analysis.health.infection.index')}}"><span>Infections Report</span></a></li>
        <li><a href="{{route('government.analysis.health.admission.index')}}"><span> Hospital Admission</span></a></li>
        <li><a href="{{route('government.report.hiv')}}"><span> Hospital Discharge </span></a></li>
        <li><a href="{{route('government.report.tv')}}"><span> Hospital Birth </span></a></li>
        <li><a href="{{route('government.report.diabetes')}}"><span>Hospital Death </span></a></li>
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Education Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('government.report.primary')}}"><span> Primary </span></a></li>
        <li><a href="{{route('government.report.secondary')}}"><span> Secondary </span></a></li>
        <li><a href="{{route('government.report.coe')}}"><span> COE </span></a></li>
        <li><a href="{{route('government.report.poly')}}"><span> Poly Technic </span></a></li>
        <li><a href="{{route('government.report.nursing')}}"><span> Nursing </span></a></li>
        <li><a href="{{route('government.report.university')}}"><span> University </span></a></li>
    </ul>
</li>
@endsection