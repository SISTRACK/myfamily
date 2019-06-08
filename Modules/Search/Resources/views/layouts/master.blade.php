@extends('layouts.master')
@if(!session('gues'))
@section('side-bar')
 <li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-account-search"></i> <span> Search </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="/search_identity">Identity</a></li>
        <li><a href="/search_relative">Relatives</a></li>
    </ul>
</li>
@endsection
@endif