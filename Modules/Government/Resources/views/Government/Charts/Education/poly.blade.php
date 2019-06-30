@extends('government::layouts.master')

@section('page-title')
    
@endsection
@section('page-content')
<h3>{{"Reported Sokoto State's Students Admitted in various Polytechnics In Nigeria"}}</h3>
<div class="col md-12">
    {!! $admitted->container() !!}
    {!! $admitted->script() !!}
</div>

<h3>{{"Reported Sokoto State's Students Graduated in various Polytechnic In Nigeria"}}</h3>
<div class="col md-12">
    {!! $graduated->container() !!}
    {!! $graduated->script() !!}
</div>
@endsection


