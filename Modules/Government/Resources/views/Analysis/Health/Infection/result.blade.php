@extends('government::layouts.master')

@section('page-content')
@section('page-title')
    {{'Reported '.session('infection').' Infection Base on Our Hospital Diagnoses in'}} {{session('result_of')}}
@endsection
<div class="col md-12">
    {!! $infection->container() !!}
    {!! $infection->script() !!}
</div>
@endsection


