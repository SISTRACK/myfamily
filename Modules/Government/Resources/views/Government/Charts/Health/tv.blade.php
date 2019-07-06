@extends('government::layouts.master')

@section('page-title')
    {{'Reported Tv Cases in'}} {{governmentChartPage()}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $tv->container() !!}
    {!! $tv->script() !!}
</div>
@endsection


