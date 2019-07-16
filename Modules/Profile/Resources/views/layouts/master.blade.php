@extends('layouts.master')
@if(!session('gues'))
@section('side-bar')
<li><a href="{{route('family.member.profile',[profile()->family->name,profile()->id])}}">My Profile</a></li>
<li><a href="{{route('family.member.profile.setting',[profile()->family->name,profile()->id])}}">My Profile Settings</a></li>
@endsection
@endif