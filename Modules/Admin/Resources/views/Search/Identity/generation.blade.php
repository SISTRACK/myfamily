@extends('admin::layouts.master')

@section('page-title')
{{Breadcrumbs::render('admin.search.identity.generation',$profile,session('available_profiles'))}}
@endsection

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h1 class="text-primary">Generation Information</h1><hr>     
        <form method="post" action="{{route('admin.search.identity.generation.search',[strtolower($profile->user->first_name.'-'.$profile->user->last_name)])}}" >
        {{csrf_field()}}
            <label for="">Number Of Generation :</label>
            <input type="number" name="generation" id="" class="form-control" value="{{old('generation')}}" placeholder="Enter number of generation to search">
            <input type="hidden" name="profile_id" value="{{$profile->id}}" />
            <input type="submit" value="Search" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@endsection