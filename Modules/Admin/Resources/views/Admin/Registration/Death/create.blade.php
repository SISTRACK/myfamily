@extends('admin::layouts.master')

@section('page-title')

{{ Breadcrumbs::render('admin.district.family.death.create',$district) }}


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