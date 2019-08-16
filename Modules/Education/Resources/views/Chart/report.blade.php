@extends('education::layouts.master')

@section('page-title')
    
@endsection

@section('page-content')

<h3>{{schoolAdmin()->school->name}}  Student Report Since Established</h3>
<div class="col md-12">
    {!! $report->container() !!}
    {!! $report->script() !!}
</div>

@endsection


