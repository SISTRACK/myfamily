@extends('layouts.master')
@section('side-bar')

<li class="has_sub">
    <a href="#" class="waves-effect"><i class="mdi mdi-lead-pencil "></i> <span> Registration </span> <span class="menu-arrow"></span></a>
    <ul class="list-unstyled">
        <li><a href="{{route('birth.index')}}"><i class="mdi mdi-baby"></i> <span>Birth</span></a></li>
        <li><a href="{{route('marriage.index')}}">Marriage</a></li>
        <li><a href="{{route('divorce.index')}}">Divorce</a></li>
        <li><a href="{{route('death.index')}}">Death</a></li>
    </ul>
</li>
  <li><a href="{{route('return.divorce')}}">Return Divorce</a></li>
  <li><a href="{{route('divorce.wife')}}">Divorce Wife</a></li>
@endsection