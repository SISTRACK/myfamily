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
            <label for="">Profile ID :</label>
            <input type="number" name="profile_id" id="" class="form-control" value="{{old('profile_id')}}" placeholder="Enter profile ID to search"><br>
            <input type="submit" value="Search Profile" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@endsection