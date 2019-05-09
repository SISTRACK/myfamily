@extends('layouts.master')
@if(!session('gues'))
@section('side-bar')
<li><a href="{{route('profile.index')}}">My Profile</a></li>
<li><a href="{{route('profile.setting')}}">My Profile Settings</a></li>
@endsection
@endif