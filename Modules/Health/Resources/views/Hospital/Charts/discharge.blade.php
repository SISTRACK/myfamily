@extends('health::layouts.master')

@section('page-title')
    
@endsection

@section('page-content')

<h3>{{doctor()->hospital->name}} Discharge Patients Report</h3>
<div class="col md-12">
    {!! $discharge->container() !!}
    {!! $discharge->script() !!}
</div>

@endsection


