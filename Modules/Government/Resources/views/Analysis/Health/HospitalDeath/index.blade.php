@extends('government::layouts.master')

@section('page-content')
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	    <form action="{{route('government.analysis.health.admission.death.search')}}" method="post">
	    	@csrf
	    	<h2 class="text-primary">Search Hospital Death Specification</h2>
	    	@include('government::Analysis.include')
	    	<button class="btn btn-info">Search Hospital Death Report</button>
	    </form>
    </div>
</div>
@endsection

@section('footer')
    
@endsection