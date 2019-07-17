@extends('layouts.master')

@section('side-bar')
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-forum "></i> <span> Forum </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('nuclear.forum.index',[profile()->family->name,'nuclear-forum'])}}">Nuclear Forum</a></li>
        <li><a href="{{route('extended.forum.index',[profile()->family->name,'extended-forum'])}}">Extended Forum</a></li>
    </ul>
</li>
@endsection
