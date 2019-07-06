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
<li><a href="{{route('population',strtolower($status))}}">Population</a></li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Social Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('report.birth')}}"><span> Births </span></a></li>
        <li><a href="{{route('report.death')}}"><span> Deaths </span></a></li>
        <li><a href="{{route('report.marriage')}}"><span> Marriages </span></a></li>
        <li><a href="{{route('report.divorce')}}"><span> Divorces </span></a></li>
        <li><a href="{{route('report.accident')}}"><span> Accidens </span></a></li>
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Health Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('report.polio')}}"><span> Polio</span></a></li>
        <li><a href="{{route('report.malaria')}}"><span> Maleria </span></a></li>
        <li><a href="{{route('report.hiv')}}"><span> HIV </span></a></li>
        <li><a href="{{route('report.tv')}}"><span> Tv </span></a></li>
        <li><a href="{{route('report.diabetes')}}"><span> Diabetes </span></a></li>
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Education Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('report.primary')}}"><span> Primary </span></a></li>
        <li><a href="{{route('report.secondary')}}"><span> Secondary </span></a></li>
        <li><a href="{{route('report.coe')}}"><span> COE </span></a></li>
        <li><a href="{{route('report.poly')}}"><span> Poly Technic </span></a></li>
        <li><a href="{{route('report.nursing')}}"><span> Nursing </span></a></li>
        <li><a href="{{route('report.university')}}"><span> University </span></a></li>
    </ul>
</li>
@endsection