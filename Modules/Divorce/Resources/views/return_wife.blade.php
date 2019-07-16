@extends('divorce::layouts.master')

@section('page-title')
{{ Breadcrumbs::render('family.wife.divorce.return',[profile()->family->name]) }}
@endsection

@section('page-content')
    @include('divorce::Forms.return_wife_form')
@endsection
