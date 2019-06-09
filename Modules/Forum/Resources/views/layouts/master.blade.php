@extends('layouts.master')

@section('side-bar')
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-forum "></i> <span> Forum </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('nuclear.forum.index')}}">Nuclear Forum</a></li>
        <li><a href="{{route('extended.forum.index')}}">Extended Forum</a></li>
    </ul>
</li>
@endsection
