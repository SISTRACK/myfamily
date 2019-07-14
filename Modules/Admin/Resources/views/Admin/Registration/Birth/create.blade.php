@extends('admin::layouts.master')

@section('page-title')

{{ Breadcrumbs::render('admin.district.family.birth.create',$district) }}

@endsection

@section('page-content')
    @if(session('family'))
        @php
            $family = session('family');
        @endphp
        @include('admin::Admin.Registration.Birth.birth_reg_form')
    
    @else
        @include('admin::Admin.Registration.Birth.verify_family')
    @endif
@endsection