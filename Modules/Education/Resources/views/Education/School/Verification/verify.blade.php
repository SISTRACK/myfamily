@extends('education::layouts.master')

@section('page-content')
<div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3 class="text-primary">Family Identity Verification</h3>
        <form action="{{route('education.school.admission.verification.verify')}}" method="post">
        	@csrf
            <input type="text" name="fid" class="form-control" placeholder ="Enter Child FID"><br>
            <button class="btn btn-primary btn-block">Verify</button>
         </form>
    </div>
    <div class="col-md-4"></div>
</div>
     
@endsection