@extends('health::layouts.master')

@section('page-content')
	<button class="btn btn-info"><a href="#" data-toggle="modal" data-target="#verify_patient" style="color: white"><i class="fa fa-plus"></i></a></button>
	@include('health::Patient.verify')
	
@endsection


