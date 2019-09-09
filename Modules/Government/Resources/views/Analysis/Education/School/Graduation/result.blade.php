@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'School Graduation Report in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $graduation->container() !!}
    {!! $graduation->script() !!}
</div>
@endsection


