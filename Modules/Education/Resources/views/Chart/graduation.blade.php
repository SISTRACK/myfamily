@extends('education::layouts.master')

@section('page-title')
    
@endsection

@section('page-content')

<h3>{{teacher()->school->name}}  Graduation Report Since Established</h3>
<div class="col md-12">
    {!! $graduation->container() !!}
    {!! $graduation->script() !!}
</div>

@endsection


