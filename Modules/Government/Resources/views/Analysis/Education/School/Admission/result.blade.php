@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'School Admission Report in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $admission->container() !!}
    {!! $admission->script() !!}
</div>
@endsection


