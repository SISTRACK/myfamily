@extends('admin::layouts.master')

@section('page-title')

{{ Breadcrumbs::render('admin.district.family.death.create',$district,$family) }}

@endsection

@section('page-content')
    
    @include('admin::Admin.Registration.Death.death_reg_form')
    
@endsection