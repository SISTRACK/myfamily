@extends('education::layouts.master')

@section('page-content')
<div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <h3 class="text-primary">Choose year</h3>
        <form action="{{route('education.school.admission.search')}}" method="post">
        	@csrf
            <select class="form-control" name="year">
                <option value="{{date('Y')}}">{{date('Y')}}</option>
                @foreach($years as $year)
                    <option value="{{$year}}">{{$year}}</option>
                @endforeach
            </select><br>
            <button class="btn btn-primary btn-block">Search</button>
         </form>
    </div>
</div>
     
@endsection