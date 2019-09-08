@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'Reported Hospital Patient Admission in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $admission->container() !!}
    {!! $admission->script() !!}
</div>
@endsection


