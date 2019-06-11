@extends('layouts.master')

@section('side-bar')
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-file-image "></i> <span> Gallary </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('private.gallary.index')}}">My Gallary</a></li>
        <li><a href="{{route('nuclear.gallary.index')}}">Nuclear Family Gally</a></li>
        <li><a href="{{route('extended.gallary.index')}}">Extended Family Gallary</a></li>
    </ul>
</li>
@endsection