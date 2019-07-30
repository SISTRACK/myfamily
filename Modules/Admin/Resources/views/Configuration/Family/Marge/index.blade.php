@extends('admin::layouts.master')

@section('page-title')

@endsection

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1 class="text-primary">Father and Child Family to Marge</h1><hr>     
        <form method="post" action="{{route('admin.config.father.child.family.verify')}}" >
        {{csrf_field()}}
            <label for="">Father E-mail :</label>
            <input type="email" name="father_email" id="" class="form-control required" value="{{old('father_email')}}" placeholder="Enter Father E-mail"><br>

            <label for="">Child E-mail :</label>
            <input type="email" name="child_email" id="" class="form-control required" value="{{old('child_email')}}" placeholder="Enter Child E-mail"><br>
            
            <input type="submit" value="Contenue" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@endsection