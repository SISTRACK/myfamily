@extends('government::layouts.master')

@section('page-title')
    {{'Reported Births in Sokoto State'}}
@endsection

@section('page-content')

<div class="col md-12">
    {!! $birth->container() !!}
    {!! $birth->script() !!}
</div>
@endsection


