@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'Reported Hospital Birth in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $birth->container() !!}
    {!! $birth->script() !!}
</div>
@endsection


