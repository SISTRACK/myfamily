@extends('layouts.master')

@section('side-bar')
    <li class="has_sub">
        <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Search </span> <span class="menu-arrow"></span></a>
        <ul class="list-unstyled">
            <li><a href="{{route('admin.search.identity.index')}}">Identity</a></li>
            <li><a href="{{route('admin.search.relative.index')}}">Relatives</a></li>
        </ul>
    </li>
@endsection