@extends('education::layouts.master')

@section('page-content')
	<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    	<h2 class="text-primary">New Amission</h2>
        <form action="{{route('education.school.admission.register',[date('Y')])}}" method="post">
        	@csrf
        	<input type="text" name="profile_id" placeholder="Student Profile ID" class="form-control"><br>

        	<input type="text" name="admission_no" placeholder="Admission No" class="form-control"><br>
                 
            <button class="btn btn-primary">Give Admission</button>
         </form>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection