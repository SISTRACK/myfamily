@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'Reported Hospital Patient Admission in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $discharge->container() !!}
    {!! $discharge->script() !!}
</div>
@endsection


