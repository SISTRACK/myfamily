@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'Reported Births Base on Registration in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $birth->container() !!}
    {!! $birth->script() !!}
</div>
@endsection


