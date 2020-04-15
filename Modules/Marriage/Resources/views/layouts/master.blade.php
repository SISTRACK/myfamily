@extends('layouts.master')

@section('side-bar')
<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Registration </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('family.birth.create',[profile()->thisProfileFamily()->name])}}"><i class="mdi mdi-baby"></i> <span>Birth</span></a></li>
        <li><a href="#" data-toggle="modal" data-terget="#newMarriage">Marriage</a></li>
        //this was included in in the main page content
        @if(profile()->husband)
        <li><a href="{{route('family.divorce.create',[profile()->thisProfileFamily()->name])}}">Divorce</a></li>
        @endif
        <li><a href="{{route('family.death.create',[profile()->thisProfileFamily()->name])}}">Death</a></li>
    </ul>
</li>
@endsection
