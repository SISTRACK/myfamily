@extends('admin::layouts.master')

@section('page-title')

{{ Breadcrumbs::render('admin.district.family.birth.create',$family) }}

@endsection

@section('page-content')
    @include('admin::Admin.Registration.Birth.birth_reg_form')
@endsection