@extends('education::layouts.master')

@section('page-content')
<div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="{{route('education.school.admission.verification.verify',[request()->route('year')])}}" method="post">
        	@csrf
             <input type="text" name="profile_id" class="form-control" placeholder ="Enter Profile ID"><br>
             <button class="btn btn-primary">Verify</button>
         </form>
    </div>
    <div class="col-md-4"></div>
</div>
     
@endsection