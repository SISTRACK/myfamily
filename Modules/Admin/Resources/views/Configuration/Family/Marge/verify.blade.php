@extends('admin::layouts.master')

@section('page-title')

@endsection

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1 class="text-primary">Verify YOur Mother</h1><hr>     
        <form method="post" action="{{route('admin.config.father.child.family.verify')}}" >
        {{csrf_field()}}
            <label for="">Mother First Name :</label>
            <input type="text" name="first_name" id="" class="form-control required" value="{{old('first_name')}}" placeholder="Enter your mother first name"><br>
            <label for="">Mother Last Name :</label>
            <input type="text" name="last_name" id="" class="form-control required" value="{{old('last_name')}}" placeholder="Enter your mother last name"><br>
            <input type="submit" value="Marge Families" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@endsection