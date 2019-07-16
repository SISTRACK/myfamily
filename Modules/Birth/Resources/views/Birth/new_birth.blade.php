@extends('birth::layouts.master')

@section('page-title')
    {{ Breadcrumbs::render('family.birth.create',[profile()->family->name]) }}
@endsection

@section('page-content')
<div class="row">
	<div class="col-sm-12">
		<div class="card-box">
			@if(session('family'))
                @include('birth::Birth.Forms.registration_form')
			@else
                @include('birth::Birth.Forms.verification_form')
			@endif
		</div>
	</div>
</div><!-- End row -->
@endsection

@section('footer')
<script>
    const app = new Vue({
        el: '#family',
        data: {
            no: '',
            yes: '',
        },
        mounted() {
        
      },
    )};

</script>
@endsection