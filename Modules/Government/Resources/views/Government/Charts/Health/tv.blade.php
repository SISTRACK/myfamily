@extends('government::layouts.master')

@section('page-title')
    {{'Reported Tv Cases in Sokoto State 2019'}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $tv->container() !!}
    {!! $tv->script() !!}
</div>
@endsection


