@extends('marriage::layouts.master')

@section('page-title')
    
@endsection

@section('page-content')
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
            @include('marriage::Marriage.Forms.registration_form')
		</div>
	</div>
</div><!-- End row -->
@endsection

@section('footer')
<script src="{{ asset('js/Ajax/lgas.js') }}"></script>
<script src="{{ asset('js/Ajax/districts.js') }}"></script>
<script src="{{ asset('js/Ajax/towns.js') }}"></script>
<script src="{{ asset('js/Ajax/areas.js') }}"></script>
@endsection