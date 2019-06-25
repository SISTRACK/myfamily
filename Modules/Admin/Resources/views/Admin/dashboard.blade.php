@extends('admin::layouts.master')

@section('side-bar')
	@include('Include.Menu.admin-side-bar')
@endsection

@section('page-content')
	@include('Include.Pages.dashboard')
@endsection


