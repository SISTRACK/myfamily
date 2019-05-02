@extends('layouts.master')

@section('side-bar')

	@if(Auth()->User()->profile)
	    @include('Include.Menu.member-side-bar')
	@else
	    @include('Include.Menu.user-side-bar')
	@endif
    
@endsection

@section('page-content')
	@include('Include.Pages.dashboard')
@endsection




