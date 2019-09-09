@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'School Student Report in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $report->container() !!}
    {!! $report->script() !!}
</div>
@endsection


