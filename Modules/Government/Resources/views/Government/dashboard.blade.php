@extends('government::layouts.master')

@section('page-content')

<div class="col md-12">
    {!! $presidentialChart->container() !!}
    {!! $presidentialChart->script() !!}
</div>
@endsection


