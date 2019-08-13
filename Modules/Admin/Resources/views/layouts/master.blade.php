@extends('layouts.master')

@section('side-bar')
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Search </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.search.identity.index')}}">Identity</a></li>
            <li><a href="{{route('admin.search.relative.index')}}">Relatives</a></li>
        </ul>
    </li>

    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="fa fa-ambulance"></i> <span> Health </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.health.hospital.index')}}"><i class="fa fa-ambulance"></i> <span>Hospitals</span></a></li>
            <li><a href="{{route('admin.health.doctor.index')}}"><i class="fa fa-user-md"></i><span>Doctors</span></a></li>
        </ul>
    </li>

    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Schools </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li>
            	<a href="{{route('admin.education.school.create')}}">New School</a>
            </li>
            <li><a href="{{route('admin.education.school.nursery.index')}}">Nursery Schools</a></li>
            <li><a href="{{route('admin.education.school.primary.index')}}">Primary Schools</a></li>
            <li><a href="{{route('admin.education.school.secondary.index')}}">Secondary Schools</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Teachers </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li>
            	<a href="{{route('admin.education.school.teacher.create')}}">New Teacher</a>
            </li>
            <li><a href="{{route('admin.education.school.teacher.nursery.index')}}">Nursery Teachers</a></li>
            <li><a href="{{route('admin.education.school.teacher.primary.index')}}">Primary Teachers</a></li>
            <li><a href="{{route('admin.education.school.teacher.secondary.index')}}">Secondary Teachers</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Police </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.security.police.station.index')}}">Stations</a></li>
            <li><a href="{{route('admin.security.police.station.user.index')}}">User Agents</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Jedicuary </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.security.court.index')}}">Court</a></li>
            <li><a href="#">User Agents</a></li>
        </ul>
    </li>
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Configurations </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.config.profile.index')}}">Profile</a></li>
            <li><a href="#">Dis Marge Family</a></li>
            <li><a href="{{route('admin.config.father.child.family.marge')}}">Merge Family</a></li>
        </ul>
    </li>
@endsection