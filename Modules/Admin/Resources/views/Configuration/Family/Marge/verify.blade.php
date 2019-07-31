@extends('admin::layouts.master')

@section('page-title')

@endsection

@section('page-content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
    <h3 class="text-primary">Mother Verification</h3><hr>     
        <form method="post" action="{{route('admin.config.father.child.family.verify.mother')}}" >
        {{csrf_field()}}
            
            <select name="first_name" class="form-control required">
                <option value="">Mother Name</option>
                @foreach($profile->husband->marriages as $marriage)
                    <option value="{{$marriage->wife->profile->user->id}}">{{$marriage->wife->profile->user->first_name}}</option>
                @endforeach
            </select><br>

            <select name="last_name" class="form-control required">
                <option value="">Mother SurName</option>
                @foreach($profile->husband->marriages as $marriage)
                    <option value="{{$marriage->wife->profile->user->id}}">{{$marriage->wife->profile->user->last_name}}</option>
                @endforeach
            </select><br>

            <select name="status" class="form-control required">
                <option value="">Mother Status</option>
                @foreach($profile->husband->marriages as $marriage)
                    <option value="{{$marriage->wife->status->id}}">
                        {{$marriage->wife->status->name}}
                    </option>
                @endforeach
            </select><br>
           
            <input type="submit" value="Verify Mother" class="form-control btn btn-primary btn-block"/>
        </form>
    </div>
</div>
@endsection