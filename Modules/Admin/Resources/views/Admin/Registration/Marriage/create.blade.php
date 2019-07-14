@extends('admin::layouts.master')

@section('page-title')
{{ Breadcrumbs::render('admin.district.family.marriage.create',$district) }}
@endsection

@section('page-content')
	@if(session('register'))
	    @php 
            $family_admin = session('family')->familyAdmin->profile;
	    @endphp
	    @include('admin::Admin.Registration.Marriage.marriage_reg_form')
	@else
	    @include('admin::Admin.Registration.Marriage.verify_family')
	@endif
@endsection