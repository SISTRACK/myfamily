@extends('layouts.master')

@section('side-bar')
<li><a href="#">Population</a></li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Health Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="#"><span> Polio</span></a></li>
        <li><a href="#"><span> Maleria </span></a></li>
        <li><a href="#"><span> HIV </span></a></li>
        <li><a href="#"><span> Tv </span></a></li>
        <li><a href="#"><span> Diabetes </span></a></li>
    </ul>
</li>
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Education Report </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="#"><span> Nursery </span></a></li>
        <li><a href="#"><span> Primary </span></a></li>
        <li><a href="#"><span> Secondary </span></a></li>
        <li><a href="#"><span> COE </span></a></li>
        <li><a href="#"><span> Poly Technic </span></a></li>
        <li><a href="#"><span> University </span></a></li>
    </ul>
</li>
@endsection