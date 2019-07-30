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
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Configurations </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.config.profile.index')}}">Profile</a></li>
            <li><a href="#">Family</a></li>
            <li><a href="{{route('admin.config.father.child.family.marge')}}">Merge Family</a></li>
        </ul>
    </li>
@endsection