@extends('health::layouts.master')

@section('page-content')

	<div class="col-md-3"></div>
    <div class="col-md-6">
        <h2 class="text-primary">View Patient Profile</h2>
        <form action="{{route('health.hospital.doctor.patient.profile.verify')}}" method="post">
            @csrf
            <input type="text" name="fid" class="form-control" placeholder ="Enter Patient FID Number"><br>
            <button class="btn btn-primary btn-block">View</button>
        </form>
    </div>

@endsection


