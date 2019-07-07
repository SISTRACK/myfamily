@extends('admin::layouts.master')
@section('page-title')
    {{$district->name.' District Dashboard'}}
@endsection
@section('page-content')
    @include('Include.Pages.dashboard')    
@endsection