@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'Reported Hospital Death in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $death->container() !!}
    {!! $death->script() !!}
</div>
@endsection


