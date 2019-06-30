@extends('government::layouts.master')

@section('page-content')

<div class="col md-12">
    {!! $population->container() !!}
    {!! $population->script() !!}
</div>
@endsection


