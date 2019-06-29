@extends('government::layouts.master')

@section('page-title')
    {{'Reported Hiv Cases in Sokoto State 2019'}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $hiv->container() !!}
    {!! $hiv->script() !!}
</div>
@endsection


