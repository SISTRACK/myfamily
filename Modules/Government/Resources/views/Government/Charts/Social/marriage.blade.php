@extends('government::layouts.master')

@section('page-title')
    {{'Reported Marriages Cases in Sokoto State'}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $marriage->container() !!}
    {!! $marriage->script() !!}
</div>
@endsection


