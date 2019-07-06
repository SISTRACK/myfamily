@extends('government::layouts.master')

@section('page-title')
    
@endsection
@section('page-content')
<h3>{{"Reported"}} {{governmentChartPage()}}  {{"Students Admitted in various College of Education In Nigeria"}}</h3>
<div class="col md-12">
    {!! $admitted->container() !!}
    {!! $admitted->script() !!}
</div>

<h3>{{"Reported"}} {{governmentChartPage()}}  {{"Students Graduated in various College of Education In Nigeria"}}</h3>
<div class="col md-12">
    {!! $graduated->container() !!}
    {!! $graduated->script() !!}
</div>
@endsection


