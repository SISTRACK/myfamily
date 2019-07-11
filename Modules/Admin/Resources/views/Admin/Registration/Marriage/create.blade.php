@extends('admin::layouts.master')

@section('page-title')
{{'New Marriage Registration in'.$district->name.' District'}}
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