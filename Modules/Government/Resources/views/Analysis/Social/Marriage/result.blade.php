@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'Reported Marriages Base on Registration in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $marriage->container() !!}
    {!! $marriage->script() !!}
</div>
@endsection


