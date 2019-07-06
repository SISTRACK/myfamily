@extends('government::layouts.master')

@section('page-title')
    {{'Reported Polio Cases in '}} {{governmentChartPage()}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $polio->container() !!}
    {!! $polio->script() !!}
</div>
@endsection


