@extends('layouts.master')
@section('side-bar')

<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Registration </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('family.birth.create',[profile()->family->name])}}"><i class="mdi mdi-baby"></i> <span>Birth</span></a></li>
        <li><a href="{{route('family.marriage.create',[profile()->family->name])}}">Marriage</a></li>
        <li><a href="{{route('family.divorce.create',[profile()->family->name])}}">Divorce</a></li>
        <li><a href="{{route('family.death.create',[profile()->family->name])}}">Death</a></li>
    </ul>
</li>
  <li><a href="{{route('family.divorce.return',[profile()->family->name])}}">Return Divorce</a></li>
  <li><a href="{{route('family.wife.divorce',[profile()->family->name])}}">Divorce Wife</a></li>
@endsection