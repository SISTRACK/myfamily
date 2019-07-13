@extends('admin::layouts.master')

@section('page-title')

{{'Register new death'}}

@endsection

@section('page-content')
    @if(session('death'))
        @php
            $family = session('family');
        @endphp
        @include('admin::Admin.Registration.Death.death_reg_form')
    
    @else
        @include('admin::Admin.Registration.Death.verify_family')
    @endif
@endsection