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
<li><a href="{{route('government.analysis.social.population.index')}}">Population</a></li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Social Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('government.analysis.social.birth.index')}}"><span> Births </span></a></li>
        <li><a href="#"><span> Deaths </span></a></li>
        <li><a href="{{route('government.analysis.social.marriage.index')}}"><span> Marriages </span></a></li>
        <li><a href="#"><span> Divorces </span></a></li>
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Health Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('government.analysis.health.hospital.infection.index')}}"><span>Infections Report</span></a></li>
        <li><a href="{{route('government.analysis.health.hospital.admission.index')}}"><span> Hospital Admission</span></a></li>
        <li><a href="{{route('government.analysis.health.hospital.admission.discharge.index')}}"><span> Hospital Discharge </span></a></li>
        <li><a href="{{route('government.analysis.health.hospital.admission.birth.index')}}"><span> Hospital Birth </span></a></li>
        <li><a href="{{route('government.analysis.health.hospital.admission.death.index')}}"><span>Hospital Death </span></a></li>
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Education Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('government.analysis.education.school.admission.index')}}"><span> Admission </span></a></li>
        <li><a href="{{route('government.analysis.education.school.graduation.index')}}"><span> Graduation </span></a></li>
        <li>
            <a href="{{route('government.analysis.education.school.student.report.index')}}"><span> Student Report </span></a>
        </li>
    </ul>
</li>

<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Security Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li>
            <a href="#"><span> Accidents </span></a>
        </li>
        <li>
            <a href="#"><span> Criminal Cases </span></a>
        </li>
        <li>
            <a href="#"><span> Floading </span></a>
        </li>
        <li>
            <a href="#"><span> Desert Encruchment </span></a>
        </li>
    </ul>
</li>
@endsection