@extends('admin::layouts.master')

@section('page-title')
{{Breadcrumbs::render()}}
@endsection

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1 class="text-primary">Profile Information</h1><hr>     
        <form method="post" action="{{route('admin.config.profile.show')}}" >
        {{csrf_field()}}
            <label for="">FID NO :</label>
            <input type="text" name="fid_no" id="" class="form-control" value="{{old('fid_no')}}" placeholder="Enter FID NO"><br>
            <input type="submit" value="Search Profile" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@endsection
