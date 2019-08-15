@extends('education::layouts.master')

@section('page-title')
    
@endsection

@section('page-content')

<h3>{{teacher()->school->name}}  Admission Report Since Established</h3>
<div class="col md-12">
    {!! $admission->container() !!}
    {!! $admission->script() !!}
</div>

@endsection


