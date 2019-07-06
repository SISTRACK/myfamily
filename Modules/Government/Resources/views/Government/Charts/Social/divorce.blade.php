@extends('government::layouts.master')

@section('page-title')
    {{'Reported Divorces in'}} {{governmentChartPage()}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $divorce->container() !!}
    {!! $divorce->script() !!}
</div>
@endsection


