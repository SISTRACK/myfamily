@extends('government::layouts.master')

@section('page-content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	    <form action="{{route('government.analysis.health.hospital.admission.search')}}" method="post">
	    	@csrf
	    	<h2 class="text-primary">Search Hospital Admission Specification</h2>
	    	@include('government::Analysis.include')
	    	<button class="btn btn-info">Search HOspital Admission Report</button>
	    </form>
    </div>
</div>
@endsection

@section('footer')
    
@endsection