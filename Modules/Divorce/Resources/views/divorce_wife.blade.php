@extends('divorce::layouts.master')

@section('page-title')
    {{ Breadcrumbs::render('family.wife.divorce',[profile()->family->name]) }}
@endsection

@section('page-content')
    @include('divorce::Forms.divorce_wife_form')
@endsection