@extends('layouts.master')

@section('side-bar')
    @if(admin()->state)
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="fa fa-account-search"></i> <span> Local Governments </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="#" data-toggle="modal" data-target="#new_lga">New LGA</a></li>
            <!-- new lga modal is include at Include/Pages/content -->
        </ul>
    </li>
    @endif
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="fa fa-account-search"></i> <span> Search </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.search.identity.index')}}">Identity</a></li>
            <li><a href="{{route('admin.search.relative.index')}}">Relatives</a></li>
        </ul>
    </li>

    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="fa fa-ambulance"></i> <span> Health </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.health.hospital.index')}}"><i class="fa fa-ambulance"></i> <span>Hospitals</span></a></li>
            <li><a href="{{route('admin.health.doctor.index')}}"><i class="fa fa-user-md"></i><span>Administrators</span></a></li>
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
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> School Admins </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li>
            	<a href="{{route('admin.education.school.teacher.create')}}">New School Admin</a>
            </li>
            <li><a href="{{route('admin.education.school.teacher.nursery.index')}}">Nursery Admins</a></li>
            <li><a href="{{route('admin.education.school.teacher.primary.index')}}">Primary Admins</a></li>
            <li><a href="{{route('admin.education.school.teacher.secondary.index')}}">Secondary Admins</a></li>
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