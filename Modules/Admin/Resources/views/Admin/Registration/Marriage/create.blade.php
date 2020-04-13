@extends('admin::layouts.master')

@section('page-title')
{{ Breadcrumbs::render('admin.district.family.marriage.create',$family) }}
@endsection

@section('page-content')
	
	@php 
		$family_admin = $family->familyAdmin->profile;
	@endphp
	@include('admin::Admin.Registration.Marriage.marriage_reg_form')
	
@endsection

@section('footer')
<script src="{{ asset('js/Ajax/lgas.js') }}"></script>
<script src="{{ asset('js/Ajax/districts.js') }}"></script>
<script src="{{ asset('js/Ajax/towns.js') }}"></script>
<script src="{{ asset('js/Ajax/areas.js') }}"></script>
@endsection