@extends('government::layouts.master')

@section('page-title')
    {{'Reported Diabetes Cases in'}} {{governmentChartPage()}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $diabetes->container() !!}
    {!! $diabetes->script() !!}
</div>
@endsection


