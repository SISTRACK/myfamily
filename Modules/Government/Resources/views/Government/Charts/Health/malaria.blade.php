@extends('government::layouts.master')

@section('page-title')
    {{'Reported Malaria Cases in'}} {{governmentChartPage()}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $malaria->container() !!}
    {!! $malaria->script() !!}
</div>
@endsection


