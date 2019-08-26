@extends('health::layouts.master')

@section('page-title')
    
@endsection

@section('page-content')

<h3>{{doctor()->hospital->name}}  Patient Admission Report</h3>
<div class="col md-12">
    {!! $admission->container() !!}
    {!! $admission->script() !!}
</div>

@endsection


