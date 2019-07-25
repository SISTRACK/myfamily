@extends('admin::layouts.master')

@section('page-tittle')

@endsection

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1 class="text-primary">Search Information</h1><hr>     
        <form method="post" action="{{route('admin.search.relative.profiles')}}" >
        {{csrf_field()}}

            <label for="">First Name :</label>
            <input type="text" name="first_name" id="" class="form-control" value="{{old('first_name')}}">
           
            <label for="">Last Name :</label>
            <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control">
            
            <input type="submit" value="Search" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@endsection