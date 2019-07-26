@extends('admin::layouts.master')

@section('page-title')
{{Breadcrumbs::render('admin.search.relative.results',session('profile'),session('profiles'),session('results'))}}
@endsection

@section('page-content')
    @include('admin::Search.result')
@endsection
