@extends('government::layouts.master')

@section('page-title')
    {{'Reported Deaths in Sokoto State'}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $death->container() !!}
    {!! $death->script() !!}
</div>
@endsection


